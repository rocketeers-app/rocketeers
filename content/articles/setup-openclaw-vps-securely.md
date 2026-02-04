---
title: "How to Setup OpenClaw on VPS Securely: The Complete 2026 Guide"
slug: setup-openclaw-vps-securely
category: Security
intro: OpenClaw is a powerful open-source AI assistant that runs on your own infrastructure. Learn how to deploy it securely on a VPS to avoid common security pitfalls.
published_at: 2026-02-04
---

## What is OpenClaw?

[OpenClaw](https://openclaw.ai) is an open-source AI assistant that runs on your own infrastructure, giving you complete control over your data and deployment. It can connect to various messaging platforms including WhatsApp, Slack, Discord, Google Chat, Signal, and iMessage. OpenClaw can control browsers, generate videos and images, and even run scheduled tasks via cron.

Unlike cloud-based AI services, OpenClaw runs entirely on your server, making it an attractive option for privacy-conscious users and organizations that need to keep their data within their own infrastructure. For more details, check the [official OpenClaw documentation](https://docs.openclaw.ai/).

## Why security matters for OpenClaw

A recent Shodan scan revealed a concerning security landscape: **42,665 OpenClaw instances were found exposed to the public internet**, with 93.4% having authentication bypasses. Even more alarming, eight instances were completely open with no password, no token, and full shell access available to anyone who connected.

This makes security configuration absolutely critical when deploying OpenClaw. An improperly secured instance could give attackers complete access to your server and all connected services.

## Choosing a VPS provider

Several VPS providers offer streamlined OpenClaw deployment with varying levels of built-in security:

**Hetzner**

Hetzner offers excellent value with double the vCPUs and RAM at a fraction of the cost compared to other providers. However, like Hostinger, you'll need to implement all security measures yourself.

**DigitalOcean (Recommended for beginners)**

DigitalOcean offers a [1-Click Deploy](https://www.digitalocean.com/community/tutorials/how-to-run-openclaw) specifically designed for OpenClaw. This deployment automatically implements security best practices including:

- Authenticated communication via gateway tokens
- Hardened firewall rules that rate-limit OpenClaw ports
- Private DM pairing by default

The 1-Click Deploy handles much of the security configuration automatically, making it ideal for users who want a secure setup without extensive manual configuration.

## Essential security measures

Regardless of which provider you choose, implement these critical security measures:

**1. Use SSH key-based authentication**

Never use password authentication for SSH access. Generate and use SSH keys instead:

```bash
# On your local machine, generate an SSH key
ssh-keygen -t ed25519 -C "your_email@example.com"

# Copy the public key to your VPS
ssh-copy-id user@your-vps-ip
```

After confirming key-based authentication works, disable password authentication in `/etc/ssh/sshd_config`:

```bash
PasswordAuthentication no
PubkeyAuthentication yes
```

**2. Keep the gateway on loopback**

The OpenClaw gateway should never be directly exposed to the internet. Configure it to listen only on localhost (127.0.0.1) and access it through an SSH tunnel or Tailscale.

**Access via SSH tunnel:**

```bash
ssh -L 8080:localhost:8080 user@your-vps-ip
```

Then access OpenClaw locally at `http://localhost:8080`

**Access via Tailscale:**

Install [Tailscale](https://tailscale.com/) on your VPS and enable Tailscale Serve to securely expose OpenClaw only to devices on your private Tailscale network.

```bash
# Install Tailscale
curl -fsSL https://tailscale.com/install.sh | sh

# Authenticate and connect
sudo tailscale up

# Serve OpenClaw securely
tailscale serve https / http://127.0.0.1:8080
```

**3. Require gateway authentication**

If you must bind OpenClaw to your LAN or Tailscale network, always require authentication. OpenClaw supports two authentication methods:

**Using a gateway token (recommended):**

```bash
# Set in your OpenClaw configuration
OPENCLAW_GATEWAY_TOKEN=your-secure-random-token-here
```

Generate a strong, random token and store it securely. You'll need this token to access the OpenClaw web interface.

**Using a password:**

```bash
# Alternative authentication method
OPENCLAW_GATEWAY_PASSWORD=your-strong-password-here
```

**4. Configure firewall rules**

Set up a firewall to restrict access to essential ports only:

```bash
# Install UFW (Uncomplicated Firewall)
sudo apt install ufw

# Deny all incoming traffic by default
sudo ufw default deny incoming
sudo ufw default allow outgoing

# Allow SSH (change 22 if using a custom port)
sudo ufw allow 22/tcp

# Enable the firewall
sudo ufw enable

# Check status
sudo ufw status
```

Do not open ports for OpenClaw gateway access. Instead, use SSH tunneling or Tailscale as described above.

**5. Keep software updated**

Regularly update both your system packages and OpenClaw itself:

```bash
# Update system packages
sudo apt update && sudo apt upgrade -y

# Update OpenClaw (run inside your OpenClaw directory)
git pull origin main
docker compose down
docker compose build --no-cache
docker compose up -d

# Check the latest release at: https://github.com/openclaw/openclaw/releases
```

## Installation and deployment

**Quick setup with Docker**

The easiest way to deploy OpenClaw is using Docker. Here's a secure setup process:

```bash
# Update system
sudo apt update && sudo apt upgrade -y

# Install Docker
curl -fsSL https://get.docker.com -o get-docker.sh
sudo sh get-docker.sh

# Clone OpenClaw repository
git clone https://github.com/openclaw/openclaw.git
cd openclaw

# Create a secure .env file
cp .env.example .env
nano .env
```

In your `.env` file, configure these critical settings:

```bash
# Generate a strong random token
OPENCLAW_GATEWAY_TOKEN=$(openssl rand -hex 32)

# Bind only to localhost
OPENCLAW_GATEWAY_HOST=127.0.0.1
OPENCLAW_GATEWAY_PORT=8080

# Set your AI provider API keys securely
OPENAI_API_KEY=your-key-here
ANTHROPIC_API_KEY=your-key-here
```

Deploy OpenClaw:

```bash
# Build and start containers
docker compose build --no-cache
docker compose up -d

# Check logs
docker compose logs -f
```

**Securing API credentials**

Store all API credentials (OpenAI, Anthropic, etc.) in environment variables, never in code or configuration files that might be committed to version control.

Create a separate `.env` file that's excluded from git:

```bash
# Ensure .env is in .gitignore
echo ".env" >> .gitignore
```

Set appropriate file permissions:

```bash
chmod 600 .env
```

## Post-installation security checks

After installation, verify your security configuration:

**1. Check exposed ports**

```bash
sudo netstat -tulpn | grep LISTEN
```

You should only see SSH (port 22) and Docker internal services. The OpenClaw gateway should be listening on 127.0.0.1 only, not 0.0.0.0.

**2. Test authentication**

Try accessing the gateway without authentication to ensure it's properly protected:

```bash
curl http://localhost:8080
```

This should return an authentication error if properly configured.

**3. Review Docker container security**

```bash
# Check running containers
docker ps

# Review container logs for errors
docker compose logs --tail=100
```

## Maintenance and monitoring

**Regular security audits**

Schedule monthly security reviews:

- Check for unauthorized SSH access attempts: `sudo grep "Failed password" /var/log/auth.log`
- Review OpenClaw access logs for suspicious activity
- Update all dependencies and Docker images
- Verify firewall rules remain intact

**Automated backups**

Set up automated backups of your OpenClaw configuration and data:

```bash
# Create a backup script
cat > /root/backup-openclaw.sh << 'EOF'
#!/bin/bash
BACKUP_DIR="/backups/openclaw"
DATE=$(date +%Y%m%d_%H%M%S)

mkdir -p $BACKUP_DIR
cd /path/to/openclaw

# Backup configuration and data
tar -czf $BACKUP_DIR/openclaw_backup_$DATE.tar.gz \
    .env \
    docker-compose.yml \
    data/

# Keep only last 30 days of backups
find $BACKUP_DIR -name "openclaw_backup_*.tar.gz" -mtime +30 -delete
EOF

chmod +x /root/backup-openclaw.sh

# Schedule daily backups via cron
(crontab -l 2>/dev/null; echo "0 2 * * * /root/backup-openclaw.sh") | crontab -
```

## Common security mistakes to avoid

1. **Exposing the gateway to 0.0.0.0** - Always bind to 127.0.0.1 and use tunneling
2. **Using weak or no authentication tokens** - Generate strong random tokens
3. **Running as root** - Create a dedicated user for OpenClaw
4. **Not updating regularly** - Set up automatic security updates
5. **Storing credentials in git** - Use environment variables and secure .env files
6. **Opening unnecessary firewall ports** - Only expose SSH, use tunnels for everything else
7. **Using default passwords** - Change all default credentials immediately
8. **Not monitoring logs** - Set up log monitoring and alerting

## Conclusion

OpenClaw is a powerful tool that requires careful security configuration. By following the practices outlined in this guide, you can deploy OpenClaw securely and avoid becoming part of the statistics of exposed instances.

Remember: security is not a one-time setup but an ongoing process. Regularly review your configuration, keep software updated, and monitor for suspicious activity.

The key principles are:

- Never expose OpenClaw directly to the internet
- Always require strong authentication
- Use SSH tunneling or Tailscale for access
- Keep software updated
- Monitor and audit regularly

With these measures in place, you can confidently run OpenClaw on your VPS while maintaining robust security.

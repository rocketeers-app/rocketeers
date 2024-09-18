---
title: Improving email deliverability
slug: improving-email-deliverability
category: Email
intro: How to prevent emails going to spam and improve the overall deliverability of your email domain.
published_at: 2022-12-06
---

When you're sending email from your website or web app, nothing is more frustrating when you get notified by your customers that your emails aren't delivering or ending up in the junk folder.

This can feel like it is not fully in your power to improve this, but when you execute all of these steps in this article, you will get better email delivery and you've done everything you could do!

## Do not ever use your own mail server

Please do not fall in the trap of sending email using your own mail server or the SMTP server that comes with your regular mailbox. In the current digital age you can't fight the tech giants like Google, Microsoft and Apple. They will crush you when you try to send email using your own mailserver. By default they will not trust it and you need to send a lot of email continously to keep trust when you have obtained it (not likely).

## Use a trustworthy email service provider

Choose an email sending service that is reliable and has a good reputation. In the following order from best to still pretty good, use one of these options: [Postmark](https://postmarkapp.com), [SendGrid](https://sendgrid.com), [Amazon SES](https://aws.amazon.com/ses/) or [Mailgun](https://mailgun.com).

Added benefits to using one of these providers is that you get great insights in what happens with the email your sending. You can view all logs and events that happen before (hopefully) entering the receiving mailbox.

Click and open tracking is also an option, but this harms the privacy of for your users. Be careful to not enable this without thinking this through.

## Configure DKIM

To authenticate the sending server, you should configure DKIM correctly for your email service provider that you chose in the previous step. This way the receiving mail server can verify that the email indeed has been sent by the legitimate server you declared to use.

## Add a valid SPF record to your DNS

In case your email provider provides a SPF record, you should add it to the DNS of your email domain. The SPF record should contain a list of all allowed domains or IPs that are allowed to send email with your domain.

Postmark is known for not providing a SPF record, because they explain it's not required anymore because the Return-Path domain is now used to check for SPF alignment.

## Setup a DMARC policy

To prevent email spoofing further, the protocol DMARC (Domain-based Message Authentication, Reporting, and Conformance) has been invented. This works together with SPF and DKIM for authentication of emails and is used to describe the actions taken when an email is not aligned with SPF or DKIM. Because the protocol is relatively new (2012) it is not so widely used as it should be.

Because of this, DMARC is one of the best improvements you can make to your existing setup. Because it marks the quality of your overall setup and in comparison to other sending mail servers.

In its most basic form you could add a DMARC record without much work like this, and still improve your email reputation by only 'having' this record:

```
v=DMARC1; p=none; pct=100; sp=none; aspf=r;
```

This practically says: we are testing the use of DMARC (p=none), for all email (pct=100), do not reject emails from subdomains (sp=none) and align relaxed with SPF (aspf=r).

To make DMARC more strict (and useful), you should receive email reports to know if legit emails are not being blocked by your DMARC policy. Receiving and aggregating these reports can be a pain, so a service like [DMARC monitoring](https://dmarc.postmarkapp.com) could come in handy.

This is how a more strict record looks like, which will reject all email that does not align with your SPF and DKIM settings:

```
v=DMARC1; p=reject; pct=100; rua=mailto:abc@dmarc.postmarkapp.com; sp=reject; aspf=s; adkim=s;
```

## Prevent hard bounces

Nothing will hurt your email domain reputation more than sending email to large lists of that contain a large percentage of not working email addresses. These (hard) bounces get noticed by the email providers like Google and Microsoft, because a large percentage of users are using their email service of choice and when they see a spike of bounces form your domain, they will give you a negative score based on these events.

What you can do to prevent hard bounces:

-   Use email confirmation for newsletters and user registrations
-   Check email addresses before adding it to your list for common errors like typos, DNS errors and RFC spec validation
-   Clean unknown email lists before sending ([NeverBounce](https://neverbounce.com))

## Write a decent subject line

If you don't want to send your emails straight to the junk folder of your users, be thoughtful with what you put in the subject line of your emails. If you use sketchy phrases like _free_, _buy_ or _now !!!_ than you will end up in the spam because this is what spammers also use to trigger the attention of people.

## Add an unsubscribe link

If your sending email more than once, make sure you add a link for the recipient to unsubscribe from your emails. Because nobody that wants to receive your email, should receive your email and it's better to not have them on your list anymore. Big numbers aren't everything and you probably get more reliably sending statistics and better open rates because of this.

## Test your email before sending it

There are some handy tools that can check a lot of requirements for a good delivery rate of your email. [Mail Tester](https://www.mail-tester.com) is one of these tools that can be a great help. Go to the website, copy the provided email address and send your email to this address. After a few seconds Mail Tester can show what errors are still in your email delivery. Make sure you get the maximum score before proceeding to sending it to your email list.

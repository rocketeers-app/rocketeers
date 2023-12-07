---
title: Best practices for sending email
slug: best-practices-for-sending-email
category: Email
intro: Improve the emails you're sending from your website or web app by following these best practices.
published_at: 2022-12-06
---

## First: Optimize deliverability

First things first, make sure your [sending email technically correct following these tips](improving-email-deliverability). This way you'll make sure email is sent the right way your hard work on writing these emails isn't for nothing.

## Keep your design simple

Compatibility with email clients is one of the most anoying things for sending email. It's the worst when you are designing a beautiful email or newsletter and seeing it destroyed by that corporately required Microsoft Outlook 2010 version.

One way or another, designing emails is a pain. It still is possible, but brace yourself. So advice is, don't make it too difficult and keep emails calm and easy.

## Use inline styles for CSS

For compatibility with all these different email clients it is advised to inline all your CSS styles. Using inline styles you can be sure that all styles are applied on your HTML elements. Because some clients strip `<head>` and `<link>` tags from the email.

It's best to automate the inlining of styles in your code, just before sending the email. So you can still develop the email like you would using stylesheets and CSS selectors. This can be done using an [open source package for inlining CSS](https://github.com/topics/inline-css).

Doing this manually is also an option, you can copy and paste your HTML in [this tool from Mailchimp](https://templates.mailchimp.com/resources/inline-css/) and it converts your HTML and separate CSS selectors to HTML with inline style attributes.

## Create bulletproof buttons

[Buttons.cm](https://buttons.cm) is an indispensable tool when creating buttons for your emails. This tool provides all the necessary legacy code that is needed for all of the different variaty of Microsoft Outlook versions.

## Compatible background images

Background images are another crazy difficult thing to achieve across email clients, also for this special feature you can use a HTML generator that creates cross compatible [image backgrounds in emails](https://backgrounds.cm).

## Write a decent subject line

If you don't want to send your emails straight to the junk folder of your users, be thoughtful with what you put in the subject line of your emails. If you use sketchy phrases like _free_, _buy_ or _now !!!_ than you will end up in the spam because this is what spammers also use to trigger the attention of people.

## Add a preheader text

A lot of email clients show an intro text right below the subject line to preview some of the contents of an email. This way the reader gets more information about what's inside the email. When you don't add a preheader text, the email client can show some random piece of text inside your email message which is not very professional looking.

Using this snippet of HTML, you can add the intro text carefully inside the `<div>` to only be shown as a preheader text and not inside the email itself:

```html
<div
    style="font-size:0px;line-height:1px;mso-line-height-rule:exactly;display:none;max-width:0px;max-height:0px;opacity:0;overflow:hidden;mso-hide:all;"
>
    <!-- Add 85-100 Characters of Preheader Text Here -->
</div>
```

## Add an unsubscribe link

If your sending email more than once, make sure you add a link for the recipient to unsubscribe from your emails. Because nobody that wants to receive your email, should receive your email and it's better to not have them on your list anymore. Big numbers aren't everything and you probably get more reliably sending statistics and better open rates because of this.

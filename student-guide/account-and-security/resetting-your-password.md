# Resetting Your Password

If you've forgotten your password — or just want to change it — here's how, in both situations: before you're logged in, and while you're already signed in.

## Before You're Signed In

On the login page, click **Forgot your password?**. If this link isn't there, your administrator has disabled this feature — contact them directly to regain access.

![The "I lost my password" form, with a single field for your username or e-mail address](/.gitbook/assets/student-lost-password.png)

1. Enter your **username or e-mail address** in the single field on the form.
2. If a CAPTCHA challenge appears, solve it (see [CAPTCHA](captcha.md)).
3. Click **Send message**.

What happens next depends on how your administrator has configured this feature:

* **You receive a link by e-mail.** Click it to open a password-reset form with **Password** and **Confirm password** fields — pick a new password yourself and submit. This link is single-use and expires after a limited time (one hour by default, though your administrator can change this); if it has expired, the reset page tells you so and you'll need to request a new one.
* **You receive a new password directly by e-mail.** On some platforms, instead of letting you choose your own password, the system generates one for you and sends it in the e-mail. Log in with it, then consider changing it to something memorable (see below).

If you use external authentication (single sign-on through your institution), password resets aren't handled by Chamilo at all — use your institution's own "forgot password" process instead.

## While You're Signed In

You can change your password anytime, without waiting to forget it:

1. Open your **avatar menu** (top-right corner) and click **My profile**.
2. Click **Change password**.
3. Enter your current password, then your new password twice, and submit.

![The Change Password form, with fields for your current password and a new password](/.gitbook/assets/student-change-password.png)

This is the same page where you can enable [Two-Factor Authentication](two-factor-authentication.md), if your platform supports it — in that case, you'll also see an "Enable two-factor authentication" checkbox here, not shown above since it isn't active on every platform.

## Tips

* **Check your spam folder** if a reset e-mail doesn't arrive within a few minutes.
* **Act quickly on reset links** — they expire, and platforms commonly set that expiry to as little as an hour.
* **Still stuck?** If self-service reset isn't enabled or isn't working, your platform administrator can always reset your account manually.

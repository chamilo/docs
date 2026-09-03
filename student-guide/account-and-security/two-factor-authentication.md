# Two-Factor Authentication

Two-factor authentication (2FA) adds a second step to signing in — a 6-digit code from an app on your phone, in addition to your password — so that knowing your password alone isn't enough to access your account.

This feature only appears if your administrator has enabled it platform-wide. If you don't see it on your account page, it hasn't been turned on for your platform.

## Enabling 2FA

1. Open your **avatar menu** and click **My profile**.
2. Click **Change password**.
3. Check the box **Enable two-factor authentication (2FA)**.
4. A QR code appears. Scan it with an authenticator app on your phone (any TOTP-compatible app works, such as Google Authenticator, Microsoft Authenticator, or Authy).
5. Enter the 6-digit code your app now shows into the **2FA code** field that appears.
6. Submit the form. You'll see a confirmation that 2FA has been activated.

You need your **current password** to make this change, whether you're turning 2FA on or off.

## Signing In With 2FA Enabled

After entering your username and password as usual, the login form shows an extra **2FA code** field in the same screen — enter the current 6-digit code from your authenticator app and submit (the button reads **Submit code** instead of **Sign in** at this point).

## If You Lose Access to Your Authenticator App

Chamilo does not generate backup or recovery codes for 2FA. If you lose the device with your authenticator app, you won't be able to produce a valid code yourself — contact your platform administrator, who can disable 2FA on your account so you can sign in again and, if you want, set it up on a new device.

## Disabling 2FA

Go back to **Change password**, uncheck **Enable two-factor authentication (2FA)**, enter your current password, and submit.

## Tips

* **Set it up before you need it** — enabling 2FA takes a minute and meaningfully protects your account.
* **Keep your authenticator app accessible** — losing it means depending on your administrator to get back in, since there are no backup codes.
* **Don't share your 2FA codes** — anyone with your password and a valid code can sign in as you.

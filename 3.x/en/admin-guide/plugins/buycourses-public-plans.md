# BuyCourses Public and Promotional Plans

The **BuyCourses** plugin can display a public free plan alongside promotional cards that lead to external offerings. This is separate from the plugin's paid course/session purchasing flow and recurring service payment configuration.

## Configure public plans

1. Open the BuyCourses administration area and its public-plan card editor.
2. Under the **Free** plan, choose whether **Show free** is enabled.
3. Enter the free plan's translated title, description and feature list using the language tabs.
4. Add promotional cards as needed. Configure each card's enabled state, position, target URL, optional image URL, and translated title, description, features and button text.
5. Save, then use the available preview/catalog link to inspect the public presentation in each configured language.

The editor saves the translated content for multiple languages. A promotional card is a **link to an external offer**, not proof of a completed payment or an automatic subscription in Chamilo.

## Course creation limits

The free plan uses the platform's standard course creation limits. BuyCourses distinguishes standard course allowances from paid course allowances. Where a finite limit is configured, the course creation interface can show usage and progress; unlimited plans do not need a percentage indicator.

Test the limits with an account that has only the standard allowance and with one that has the applicable paid allowance. A public promotional card should never bypass server-side course creation permissions.

## Payment behavior

Public plan cards do not replace BTCPay, Stripe, PayPal or the plugin's established course purchase and recurring service flows. Continue to manage and test payment gateways in the existing BuyCourses configuration.

See [BuyCourses: Payments and Recurring Services](buycourses.md). Implementation: [PR #9369](https://github.com/chamilo/chamilo-lms/pull/9369).

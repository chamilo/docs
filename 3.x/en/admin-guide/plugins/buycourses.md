# BuyCourses: Payments and Recurring Services

The **BuyCourses** plugin sells access to courses and sessions and can offer paid services. Payment methods depend on which gateways have been configured for the installation.

## Payment configuration

Open **Administration > Plugins > BuyCourses** and go to its payment configuration area. Maintain the gateway credentials on the server, not in a learner-facing page. Existing methods such as Stripe and PayPal continue to operate independently of BTCPay Server.

### BTCPay Server (course and session purchases)

The plugin also supports **BTCPay Server** for purchases of courses and sessions:

1. Enable the BTCPay payment method in BuyCourses configuration.
2. Set the BTCPay **Server URL**, **Store ID**, **Greenfield API key** and **webhook secret**.
3. Use the payment configuration's **connection test** to confirm Greenfield API access.
4. Configure the webhook at the BTCPay end using the webhook URL shown by the plugin and the same secret.
5. Complete a small test purchase before offering this option to learners.

The buyer is redirected to the BTCPay-hosted checkout. Chamilo verifies webhook signatures and retrieves the invoice again to validate the **store, amount, currency and order details** before marking the order paid and enrolling the purchaser. A browser return can reconcile a missed or delayed webhook. Repeated notifications do not create duplicate fulfilment.

Only verified settled payments (including accepted overpayments and explicitly administrator-marked settled invoices) grant access. **Partial, late, expired or invalid payments must not be treated as automatically fulfilled**; exceptional payments require manual review.

**Existing installations:** Run the plugin's update procedure once to create `plugin_buycourses_btcpay_account`. An administrator can open `/plugin/BuyCourses/update.php` or save the BTCPay payment configuration, which also ensures the plugin table exists. This update is specific to BuyCourses, not a global database migration.

BTCPay is **not** documented here as a recurring-services gateway; do not assume it implements Stripe/PayPal-style automatic subscription renewals.

## Recurring service lifecycle

Learners can use **My Services** to view their active recurring services and their purchase/payment history. For services with supported automatic renewals:

* Each renewal payment has its own historical record and receipt.
* Cancelling a renewal prevents future charges but leaves the paid service accessible until its current paid period expires.
* Administrators can also cancel renewals from the **service sales report**.
* An active, pending or otherwise live recurring subscription is protected against duplicate purchases.
* An expired or fully cancelled service can be purchased again.

**Purchase history** and **payment history** are separate: a single service purchase may have several renewal payments. Do not infer that a renewed payment is a second purchase.

## Service sales payment totals

In the administrator **service sales report**, two columns help distinguish the original order amount from payments collected over time:

* **Last payment** displays the date of the most recent recorded successful payment for that service sale. If no payment date is available, the report shows a dash.
* **Total collected** shows the initial collected purchase amount plus recorded successful renewal amounts, formatted in the service currency. It is not the same as the price of a single billing period.

The calculation uses the service sale audit history, avoids counting duplicate renewal events and accounts for the initial Stripe subscription charge without counting it twice. For exceptional payment or refund cases, reconcile the report with the payment provider; the amount shown is not a gateway payout or a separate refund ledger.

## Historical Stripe subscriptions

BuyCourses can reconcile Stripe invoice history for older recurring services whose renewal transactions were not fully recorded in the plugin audit log. The **My Services** view and service sales report can refresh those records and update the locally known paid period and totals. Administrators should verify exceptional payment-history differences against Stripe rather than editing sales directly.

## Operational checks

After upgrading, test a complete course purchase, a session purchase if sold, a delayed/replayed webhook, expired and partial BTCPay invoices, an automatic renewal, and cancellation with access lasting until the end of the paid period. Keep credentials and webhook secrets out of screenshots, logs, and support tickets.

Changes: [BTCPay #9286](https://github.com/chamilo/chamilo-lms/pull/9286), [recurring services #9288](https://github.com/chamilo/chamilo-lms/pull/9288), [Stripe reconciliation #9293](https://github.com/chamilo/chamilo-lms/pull/9293), [service sale totals #9220](https://github.com/chamilo/chamilo-lms/pull/9220).

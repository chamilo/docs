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

## Filtering sales reports

The **course and session sales report** can be filtered by order status, user, date range or email. Optional product filters let you narrow results by product type and product name. The **service sales report** supports status filtering plus user/email/name/order-reference search and a service-name search. Review the active filters before exporting or reconciling sales; the two report screens have different filter controls.

See [BuyCourses sales filters PR #9387](https://github.com/chamilo/chamilo-lms/pull/9387).

## Subscription-linked course lifecycle and deletion safeguards

BuyCourses can close, hide and reactivate courses associated with recurring service subscriptions as their paid status changes. In a service's **Subscription behavior JSON**, `hide_after_days` specifies the delay after closure before hiding a course (default 30 days), while `delete_after_days` specifies the delay after hiding before permanent deletion. Deletion is disabled by default (`null`); only a positive value makes a course eligible.

Administrators can review eligible, pending and blocked courses at `/admin/buycourses/course-lifecycle`. The interface supports a non-destructive simulation and targeted deletion of **one eligible course per execution**, guarded by explicit confirmation. The CLI processor `chamilo:buycourses:process-recurring-subscriptions` also supports `--dry-run`, `--delete-expired` and `--max-deletions` (1–25). Without `--delete-expired`, it does not permanently delete courses.

**Permanent deletion is destructive.** Keep backups and test with disposable courses first. Eligibility checks protect active sales, session-linked courses and inconsistent ownership; automatic deletion is blocked for multi-access-URL installations. Review concurrent renewal/deletion behavior before scheduling destructive cleanup in production. See [subscription course lifecycle PR #9442](https://github.com/chamilo/chamilo-lms/pull/9442).

## Operational checks

After upgrading, test a complete course purchase, a session purchase if sold, a delayed/replayed webhook, expired and partial BTCPay invoices, an automatic renewal, and cancellation with access lasting until the end of the paid period. Keep credentials and webhook secrets out of screenshots, logs, and support tickets.

## Payment hardening

### Gateway amount check (Redsys / Cecabank)

When the bank notifies the platform that a payment succeeded, BuyCourses compares the amount the bank charged (in cents, from the signed notification) with the price of the sale. If they differ, the notification is refused, the sale stays pending and a line `[BuyCourses] Redsys notification refused` or `[BuyCourses] Cecabank notification refused` is written to the PHP error log. Normal payments are unaffected.

If a sale stays pending although the buyer paid, check the log: a price changed after the order was created, or a partial payment, will show up there. Complete such a sale manually from the sales report once verified.

### Security tokens

* Coupon forms (add / configure), the public plan cards form, and the payout actions use the same BuyCourses admin token as every other plugin admin page. A form left open for a long time still works as long as the session is alive; after logging out and in again, reload the page before saving (otherwise a "Not validated" message is shown).
* The "request invoice" page (`request_invoice.php`) and the web trigger of `process_recurring_subscriptions.php` need the token in the link (`buycourses_admin_sec_token=...`). Links that were bookmarked or mailed without it show "Not validated". The command-line/cron run (`php .../process_recurring_subscriptions.php` or the console command) is unchanged and needs no token.
* Success pages (PayPal, Stripe, subscriptions, services) only show a sale to the user who bought it.
* Payout actions (PayPal mass payment, cancelling a payout) are restricted to platform administrators (session administrators are no longer accepted) and must be sent as POST with the token.

### Dates

The end date of a subscription sale is now always computed in UTC, like the sale date, whatever the server timezone is.

### Multi-URL limits

The course-creation and hosting limits applied when a service expires follow the same rule as the rest of the platform: a setting locked, or marked not changeable, on the main URL cannot be overridden by another URL.

Changes: [BTCPay #9286](https://github.com/chamilo/chamilo-lms/pull/9286), [recurring services #9288](https://github.com/chamilo/chamilo-lms/pull/9288), [Stripe reconciliation #9293](https://github.com/chamilo/chamilo-lms/pull/9293), [service sale totals #9220](https://github.com/chamilo/chamilo-lms/pull/9220).

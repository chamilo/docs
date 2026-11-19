# Encryption at Rest for User Profile Fields

Chamilo 3.1 can optionally encrypt selected personal profile fields before storing them in the database. This first implementation covers **biography**, **phone**, and **address**. Encryption is **disabled by default** and requires a private encryption key. It does not encrypt all user information or replace disk, database, transport, or backup security.

## Before enabling encryption

Only a platform administrator with server access should perform the rollout. First, confirm that the installation includes the Chamilo 3.1 migrations for encrypted field storage, take a recoverable database backup, and plan a secure backup of the encryption key **separately from the database**. Test restoration procedures before changing production data.

The key is stored at `var/data-at-rest/master.key`, outside the public web root. Never publish it, paste it into a support request, or commit it to Git. Losing the original key can make encrypted data unreadable. Do not generate a replacement key if any user data is already encrypted.

## Initialize the key

Run the command once in preview mode:

```bash
php bin/console chamilo:security:initialize-at-rest-key
```

If it reports that no encrypted data exists and the key can be provisioned, initialize it explicitly:

```bash
php bin/console chamilo:security:initialize-at-rest-key --apply
```

If the command reports an existing compatible key, no replacement is performed. If encrypted rows exist but the key is missing or mismatched, **stop** and recover the original key.

## Choose protected fields

Open **Administration > Settings > Security** and select **Biography**, **Phone**, and/or **Address** in the encrypted user fields setting. Select only the fields you intend to protect. New writes to selected fields use authenticated encryption (libsodium XChaCha20-Poly1305); legacy cleartext records remain readable until explicitly backfilled.

## Inspect and backfill existing data

The backfill commands do not modify records without `--apply`. Prefer a single QA user before a wider batch:

```bash
php bin/console chamilo:security:encrypt-user-biographies --user-id=102
php bin/console chamilo:security:encrypt-user-profile-fields --field=phone --user-id=102
php bin/console chamilo:security:encrypt-user-profile-fields --field=address --user-id=102
```

After verifying key availability, field selection, backups and the QA account, run an intentional pilot:

```bash
php bin/console chamilo:security:encrypt-user-biographies --user-id=102 --apply
php bin/console chamilo:security:encrypt-user-profile-fields --field=phone --user-id=102 --apply
```

Replace `102` with an actual test user ID. For larger datasets, use the optional `--batch-size` argument (1–500), review command output and application behavior, and plan batches during a maintenance window. Do not run a whole-database backfill without a tested rollback strategy.

## Operational limitations

- This is the first phase of field-level encryption, not full-database encryption.
- Older direct-SQL integrations and exports may not know how to read encrypted values; verify them before rollout.
- A database backup **without** a corresponding recoverable key is insufficient.
- Do not log raw field contents or include key material in diagnostics.
- Rolling back application code alone does not decrypt stored values.

See [Security settings](../platform-settings/security-settings.md) for general platform security options. Implementation: [Chamilo LMS PR #9491](https://github.com/chamilo/chamilo-lms/pull/9491).

# Plugin xapi

The xAPI support was included in Chamilo since version 1.11.16 as a plugin and will be included in the core later.

Activating the plugin activates several features in Chamilo.

## Connection to an External LRS

Activating the plugin allows first to send xapi statement to an external LRS when performing activities in Chamilo.
So first you have to activate the plugin.
![](../../.gitbook/assets/xapiPluginActivate.png)

In the configuration, set the data from the external LRS as indicated and the activities that you want to follow from Chamilo.
![](../../.gitbook/assets/xapiPluginConfiguration.png)

When an event happens in Chamilo that has been configured to send xAPI statement then the statement is being savec locally in the "xapi_shared_statement" table so that it does not take long to register, since sending to an LRS could take time so it is done asynchronously with a cron that calls plugin/xapi/cron/send_statements.php every hour for example. This script sends 100 statements each time it is called so you have to adapt the cron frequency depending on your platform usage.

From this moment, the xAPI statements of the selected events will be sent to the external LRS.

## Chamilo as LRS

Chamilo can be the LRS that stores data from Chamilo or from other external applications.
This is why on the Chamilo administration page a Plugins block appears with a link for "Experience API (xAPI).
![](../../.gitbook/assets/xapiPluginAdminPage.png)

On this page click on the + to create a new account to connect to the LRS of your Chamilo.
![](../../.gitbook/assets/xapiPluginCreateAccount.png)
From this moment the LRS of your Chamilo is available and can be used with your Chamilo or with any tool compatible with xAPI indicating the user data that you just created and the URL of your Chamilo with /plugin/xapi/lrs.php at the end.

## xAPI package import

Activating the xAPI plugin adds an activity tool to each Chamilo course.
In this tool you can import xAPI compliant content pack.
![](../../.gitbook/assets/xapiPluginActivityTool.png)

These activities can be launched from this tool or can be included as a Chamilo lesson item.
![](../../.gitbook/assets/xapiPluginIncludeInLesson.png)

In the activity tool the teacher can see what has been recorded from the xAPI activity.
![](../../.gitbook/assets/xapiPluginReportTool.png)

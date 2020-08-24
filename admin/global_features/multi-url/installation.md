### Installation {#installation}

To configure the multi-URL mode, you will need

*   access to your web server&#039;s configuration

*   access to the definition of your domain names

*   access to the Chamilo configuration file

The installation process is as follows

*   update _main/inc/conf/configuration.php_ by removing the comments marker before the line : _$_configuration[&#039;multiple_access_urls&#039;] = true;_

*   add ServerAlias directives inside your Apache&#039;s VirtualHost (see below)

*   define domain or sub-domain names (DNS) so they point to your server

*   [deprecated] add line “1,1” in your _access_url_rel_user_ table (this line is not necessary anymore, starting from Chamilo LMS 1.9).

*   go to the Chamilo admin page and follow the link _Multiple URL portals_

*   redefine your main URL (replace _localhost_) and add the desired sub-portals, then add and enable a local administrator in each of them

![](../../assets/graficos97.png)Illustration 83: Administration - Multi-URLs

For two different Multi-URLs and one administrative one, based on the domain _campusabc.com_, the VirtualHost would look something like this:

ServerAdmin webmaster@campusabc.com

DocumentRoot /var/www/campusabc.com /

ServerName admin.campusabc.com

ServerAlias pepsi.campusabc.com

ServerAlias cocacola.campusabc.com

# other host settings here #

Don&#039;t forget to always consider that your first portal will be a generic, administration, portal. You should preferably not use it for direct access by students. Declare something like admin.[domain-name] as the first host, then declare the URLs you will really use.
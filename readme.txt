=== Prevent user name and email leakage ===
Contributors: mark-k
Tags: calmPress, Security, Privacy, user-enumeration
Requires at least: 4.5
Tested up to: 4.9.5
Requires PHP: 7.0
Stable tag: 1.0.0
License: GPLv2
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Stops user name enumeration and other type of user name and email leakages.

== Description ==
Stops user name enumeration and other type of user name and email leakages.

Specifically does the following:
1. When the site is configured to use pretty permalinks, the plugin will prevent
   the automatic redirect of usrl which include user ID, like example.com/?author=1, to
   something like example.com/author/admin which will leak the existence of a user
   named admin which can be used in further brute force attacks.
   (This is also know as "user enumeration").

2. With the REST API restrict user name related information (actual user name
   and user posts page URL) to only admin users.

3. Preventing authentication failure notices on the login page to disclose
   the existence of user names/user emails resulting from displaying different
   messages hen the user is incorrect and when the password is incorrect. Just
   display the same failure message for whatever is the failure reason.

4. Preventing the reset password mechanism from disclosing user names/user emails
   resulting from displaying different messages when a user/email for which a reset
   is requested exist in the DB, and when it does not. Just display the same message
   for both.

Even with the plugin active, if your theme displays author information while linking
to author pages this can be used for user name leakage. In this case you should
think about totally decoupling user and author information with plugins like
https://wordpress.org/plugins/authors-as-taxonomy/

Another thing that the plugin do not do is to handle leakage resulting from the use
of gravatar, as this requires a replacement of gravatar functionality itself and
it is much harder to exploit than the other leakages.

And last leakage hole not covered right now, but might be covered in the future,
is leakage of information via the sign in process. We leave it for later as most
installs do not allow people to sign in.

Read more on the plugins main page https://calmpress.org/wordpress-plugins/prevent-user-name-and-email-leakage/

= Documentation =

= Contribute =

Pull Requests, bug reports and/or enhancement suggestions are welcome at https://github.com/calmPress/Authors-as-taxonomy

== Installation ==

== Screenshots ==

== Changelog ==

= 1.0.0 - December 25th 2017 =
* Initial release

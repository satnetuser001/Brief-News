Brief News is a web application of news in a concise and impartial presentation with links to sources on Laravel 10.13.0.

Deployed web application:
http://briefnews.dp.ua/

Articles can be sorted by category and locale using the custom sort panel.

The differentiation of user rights is implemented using the Laravel/ui library and Laravel policies. Users roles: root, admin, writer, reader, unauthenticated.

The project uses "soft deletion" to be able to restore deleted users and articles. The deleted user cannot authenticate. A banned writer cannot write new articles. Deleted articles are not displayed.

Seeds have been created to fill the site with test data and instructions for use.
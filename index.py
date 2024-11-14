from office365.runtime.auth.authentication_context import AuthenticationContext
from office365.sharepoint.client_context import ClientContext

# SharePoint en API-gegevens
site_url = "https://ogt013.sharepoint.com/sites/Yurls-Redesign"
client_id = "40206093@ogt013.nl"
client_secret = "Mootje013@"

# Authenticatie instellen
context_auth = AuthenticationContext(site_url)
if context_auth.acquire_token_for_app(client_id, client_secret):
    ctx = ClientContext(site_url, context_auth)
    target_list = ctx.web.lists.get_by_title("Lesmaterialen")
    items = target_list.get_items()
    ctx.load(items)
    ctx.execute_query()

    for item in items:
        print(f"Item ID: {item.id}, Title: {item.properties['Title']}")
else:
    print("Authenticatie mislukt")

<<<<<<< HEAD
# FRONTEND/__init__.py
=======
>>>>>>> 4d66c180241f38d4ee1ffa18d4c8c0c0f8609fbe
from office365.runtime.auth.authentication_context import AuthenticationContext
from office365.sharepoint.client_context import ClientContext

# SharePoint en API-gegevens
site_url = "https://ogt013.sharepoint.com/sites/Yurls-Redesign"
client_id = "40206093@ogt013.nl"
<<<<<<< HEAD
client_secret = "tempp"
=======
client_secret = "Mootje013@"
>>>>>>> 4d66c180241f38d4ee1ffa18d4c8c0c0f8609fbe

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

import json

from office365.sharepoint.client_context import ClientContext
from office365.runtime.auth.authentication_context import AuthenticationContext

site_url = "https://ogt013.sharepoint.com/sites/Yurls-Redesign/"
username = "40206093@ogt013.nl"
password = "Mootje013@"

context = AuthenticationContext(site_url)
if context.acquire_token_for_user(username, password):
    ctx = ClientContext(site_url, context)
    target_list = ctx.web.lists.get_by_title("Lesmaterialen")
    items = target_list.get_items()
    ctx.load(items)
    ctx.execute_query()

    # Verwerk de gegevens
    data = []
    for item in items:
        data.append({
            "id": item.properties["ID"],
            "categorie": item.properties["categorie"],
            "icon": item.properties["icon"],
            "vak": item.properties["vak"],
            "onderwerp": item.properties["onderwerp"],
            "url": item.properties["url"],
            "Stakeholder": item.properties["Stakeholder"],
            "prijs": item.properties["prijs"],
            "Taal": item.properties["Taal"],
            "Platform": item.properties["Platform"],
            "Description": item.properties.get("Description", "")
        })

    # Sla de gegevens op in een JSON-bestand
    with open("data.json", "w") as json_file:
        json.dump(data, json_file, indent=4)

    print("Data succesvol opgeslagen in data.json")
else:
    print("Authenticatie mislukt")

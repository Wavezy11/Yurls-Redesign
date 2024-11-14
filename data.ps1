# SharePoint-site URL
$siteUrl = "https://ogt013.sharepoint.com/sites/Yurls-Redesign/"

# Je gebruikersnaam en wachtwoord
$username = "40206093@ogt013.nl"
$password = "Mootje013@"

# Maak een PSCredential object
$securePassword = ConvertTo-SecureString $password -AsPlainText -Force
$creds = New-Object System.Management.Automation.PSCredential ($username, $securePassword)

# Verbind met SharePoint Online via PnP
Connect-PnPOnline -Url $siteUrl -Credentials $creds

# Lijstnaam
$listName = "Lesmaterialen"

# Haal de lijstitems op
$items = Get-PnPListItem -List $listName

# Data opslaan in een JSON-bestand
$outputFile = "data.json"

$items | ForEach-Object {
    # Maak een object voor elk item
    $itemData = @{
        "id" = $_.Id
        "categorie" = $_.categorie
        "icon" = $_.icon
        "vak" = $_.vak
        "onderwerp" = $_.onderwerp
        "url" = $_.url
        "Stakeholder" = $_.Stakeholder
        "prijs" = $_.prijs
        "Taal" = $_.Taal
        "Platform" = $_.Platform
        "Description" = $_.Description
    }

    # Converteer naar JSON en sla op in bestand
    $itemData | ConvertTo-Json -Depth 3 | Out-File -Append $outputFile
}

Write-Host "Data succesvol opgeslagen in $outputFile"

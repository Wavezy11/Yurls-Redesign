<?php
// Database verbinding
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "subjects";

// Maak verbinding met de database
$conn = new mysqli($servername, $username, $password, $dbname);

// Controleer verbinding
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Voeg nieuwe link toe
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['add_link'])) {
    $subject = $_POST['subject'];
    $text = $_POST['text'];
    $url = $_POST['url'];

    $stmt = $conn->prepare("INSERT INTO subjects_links (subject, text, url) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $subject, $text, $url);
    
    if ($stmt->execute()) {
        $success_message = "Link added successfully!";
    } else {
        $error_message = "Error adding link: " . $stmt->error;
    }
    $stmt->close();
}

// Edit link
if (isset($_GET['action']) && $_GET['action'] === 'edit') {
    $id = $_GET['id'];
    $result = $conn->query("SELECT * FROM subjects_links WHERE id = $id");
    $linkToEdit = $result->fetch_assoc();
}

// Update link
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['edit_link'])) {
    $id = $_POST['id'];
    $subject = $_POST['subject'];
    $text = $_POST['text'];
    $url = $_POST['url'];

    $stmt = $conn->prepare("UPDATE subjects_links SET subject = ?, text = ?, url = ? WHERE id = ?");
    $stmt->bind_param("sssi", $subject, $text, $url, $id);
    
    if ($stmt->execute()) {
        $success_message = "Link updated successfully!";
    } else {
        $error_message = "Error updating link: " . $stmt->error;
    }
    $stmt->close();
}

// Verwijder link
if (isset($_GET['action']) && $_GET['action'] === 'delete') {
    $id = $_GET['id'];

    $stmt = $conn->prepare("DELETE FROM subjects_links WHERE id = ?");
    $stmt->bind_param("i", $id);
    
    if ($stmt->execute()) {
        $success_message = "Link deleted successfully!";
    } else {
        $error_message = "Error deleting link: " . $stmt->error;
    }
    $stmt->close();
}

// Links ophalen uit de database
$links = $conn->query("SELECT * FROM subjects_links");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="css/dashboard.css">
    <style>
        /* Basic Styling */
body, html {
    margin: 0;
    padding: 0;
    font-family: 'Arial', sans-serif;
    background-color: #F0F4F8;
    color: #333;
    box-sizing: border-box;
}

/* Header */
header {
    background-color: #ffffff;
    padding: 20px 40px;
    border-bottom: 1px solid rgba(0, 0, 0, 0.1);
}

header h1 {
    margin: 0;
    font-size: 24px;
}

/* Main Content */
main {
    padding: 40px;
    max-width: 1200px;
    margin: 0 auto;
    background-color: #FFFFFF;
    border-radius: 12px;
    box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.05);
}

/* Section Styling */
section {
    margin-bottom: 40px;
}

section h2 {
    font-size: 20px;
    margin-bottom: 20px;
}

/* Form Styling */
form {
    display: flex;
    flex-direction: column;
    gap: 10px;
}

form input, form button {
    padding: 10px;
    border: 1px solid #d1d1d1;
    border-radius: 5px;
}

form button {
    background-color: #8F88FD;
    color: white;
    border: none;
    cursor: pointer;
    transition: background-color 0.3s;
}

form button:hover {
    background-color: #6b5eea;
}

/* Table Styling */
table {
    width: 100%;
    border-collapse: collapse;
}

table th, table td {
    padding: 10px;
    border: 1px solid #d1d1d1;
    text-align: left;
}

table th {
    background-color: #f9f9f9;
}

/* Footer Styling */
footer {
    background-color: #f1f1f1;
    padding: 20px 0;
    text-align: center;
    box-shadow: 0 -2px 5px rgba(0, 0, 0, 0.1);
}

footer p {
    margin: 0;
    color: #333;
}
/* Notification styles */
.notification {
    position: fixed;
    top: 20px;
    left: 50%;
    transform: translateX(-50%);
    padding: 15px 30px;
    font-size: 16px;
    color: white;
    border-radius: 5px;
    box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
    z-index: 1000;
    opacity: 0;
    transition: opacity 0.5s, top 0.5s;
}

.notification.success {
    background-color: #4CAF50; /* Groen voor succes */
}

.notification.error {
    background-color: #F44336; /* Rood voor fout */
}

.notification.show {
    opacity: 1;
    top: 40px;
}
  


        </style>
</head>
<body> <header>
        <h1>Dashboard</h1>
    </header>
    <main>
        <section>
            <h2><?php echo isset($linkToEdit) ? 'Edit Link' : 'Voeg linkjes toe'; ?></h2>
            <form method="post" id="addLinkForm">
                <input type="hidden" name="id" value="<?php echo isset($linkToEdit) ? $linkToEdit['id'] : ''; ?>">
                <input type="text" id="searchInput" placeholder="Zoek het vak naar keuze" list="subjectsList" name="subject" required value="<?php echo isset($linkToEdit) ? htmlspecialchars($linkToEdit['subject']) : ''; ?>">
        <datalist id="subjectsList">
            <?php
            // Haal de vakken op uit de database
            $subjects = $conn->query("SELECT DISTINCT subject FROM subjects_links");
            while ($row = $subjects->fetch_assoc()) {
                echo '<option value="' . htmlspecialchars($row['subject']) . '">';
            }
            ?>
        </datalist>
                <input type="text" name="text" placeholder="Link Titel" required value="<?php echo isset($linkToEdit) ? htmlspecialchars($linkToEdit['text']) : ''; ?>">
                <input type="url" name="url" placeholder="Link URL" required value="<?php echo isset($linkToEdit) ? htmlspecialchars($linkToEdit['url']) : ''; ?>">
                <button type="submit" name="<?php echo isset($linkToEdit) ? 'edit_link' : 'add_link'; ?>">
                    <?php echo isset($linkToEdit) ? 'Update Link' : 'Voeg link toe'; ?>
                </button>
            </form>
        </section>
        <section>
            <h2>Bestaande linkjes</h2>
            <table>
                <thead>
                    <tr>
                        <th>Vak</th>
                        <th>Naam</th>
                        <th>URL</th>
                        <th>Acties</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = $links->fetch_assoc()) : ?>
                        <tr>
                            <td><?php echo htmlspecialchars($row['subject']); ?></td>
                            <td><?php echo htmlspecialchars($row['text']); ?></td>
                            <td><a href="<?php echo htmlspecialchars($row['url']); ?>" target="_blank">Bekijk URL</a></td>
                            <td>
                                <a href="?action=edit&id=<?php echo $row['id']; ?>" class="edit">Edit</a>
                                <a href="?action=delete&id=<?php echo $row['id']; ?>" class="delete">Verwijderen</a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </section>
    </main>
    <footer>
        <p>&copy; 2024 Yonder. All rights reserved.</p>
    </footer>
    <script>
        function filterSubjects() {
            const input = document.getElementById('searchInput');
            const filter = input.value.toLowerCase();
            const dataList = document.getElementById('subjectsList');
            const options = dataList.options;

            for (let i = 0; i < options.length; i++) {
                const option = options[i];
                if (option.value.toLowerCase().indexOf(filter) > -1) {
                    option.style.display = '';
                } else {
                    option.style.display = 'none';
                }
            }
        }

        document.getElementById('searchInput').addEventListener('input', filterSubjects);
    </script>
</body>
</html>

<?php
$conn->close();
?>
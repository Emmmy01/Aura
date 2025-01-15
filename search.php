<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "integration";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$query = isset($_GET['query']) ? $_GET['query'] : '';

$results = [];
if ($query) {
    // Prepare and bind
    $stmt = $conn->prepare("SELECT id, name, description, image_path, detail_page FROM items WHERE name LIKE ? OR description LIKE ?");
    $searchTerm = '%' . $query . '%';
    $stmt->bind_param('ss', $searchTerm, $searchTerm);
    $stmt->execute();
    $result = $stmt->get_result();

    // Fetch results
    while ($row = $result->fetch_assoc()) {
        $results[] = $row;
    }

    $stmt->close();
}

// Close the database connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Results</title>
    <link rel="stylesheet" href="style.css">
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
    />
</head>
<style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 20px;
        color: white;
        background: black;
    }

    h1 {
        color: white;
        font-size: 24px;
        font-size: 15px;
    }

    .roo {
        text-decoration: none;
        color: white;
        font-size: 20px;
        margin-bottom: 2px;
        margin-top: 12px;
        display: inline-block;
    }

    #results {
        display: grid; /* Use grid layout */
        grid-template-columns: repeat(2, 1fr); /* Two columns */
        gap: 29px; /* Space between items */
        padding: -9px;
        margin-top: 30px
    
    }
   

    .product-card {
        background: #1e1e1e;
        width: 90%;
        height: 210px;
        border-radius: 10px;
        overflow: hidden;
        text-align: center;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2);
        padding: 10px;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        transition: transform 0.2s ease-in-out, box-shadow 0.2s ease-in-out;
    }

    .product-card:hover {
        transform: scale(1.05);
        box-shadow: 0 6px 12px rgba(0, 0, 0, 0.3);
    }

    .product-card img {
        max-width: 170%;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        height: 140px;
        border-radius: 8px;
        margin-bottom: 10px;
    }

    .product-card .product-title {
        font-size: 10px;
        font-weight: bold;
        margin-bottom: 5px;
        color: #f8f8f8;
    }

    .product-card .product-description {
        font-size: 8px;
        color: #ccc;
        margin-bottom: 10px;
    }

    .product-card a {
        text-decoration: none;
        font-size: 10px;
        color: #1364f1;
    }

    .product-card a:hover {
        text-decoration: underline;
    }

    /* Loading Animation */
    .loading {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.7);
        display: flex;
        justify-content: center;
        align-items: center;
        z-index: 9999;
    }

    .loading.hidden {
        display: none;
    }

    .loading svg polyline {
        fill: none;
        stroke-width: 3;
        stroke-linecap: round;
        stroke-linejoin: round;
    }

    .loading svg polyline#back {
        stroke: rgba(10, 49, 138, 0.2);
    }

    .loading svg polyline#front {
        stroke: rgb(21, 95, 207);
        stroke-dasharray: 48, 144;
        stroke-dashoffset: 192;
        animation: dash_682 1.4s linear infinite;
    }

    @keyframes dash_682 {
        72.5% {
            opacity: 0;
        }
        to {
            stroke-dashoffset: 0;
        }
    }
    /* From Uiverse.io by d4niz */ 
.contactButton {
  background:  #1364f1;
  color: white;
  font-family: inherit;
  padding: 0.45em;
  padding-left: 1em;
  font-size: 8px;
  font-weight: 500;
  border-radius: 0.9em;
  border: none;
  cursor: pointer;
  letter-spacing: 0.05em;
  display: flex;
  align-items: center;
  box-shadow: inset 0 0 1.6em -0.6emrgb(27, 24, 208);
  overflow: hidden;
  position: relative;
  height: 2.8em;
  padding-right: 3em;
  left: 22px;
}

.iconButton {
  margin-left: 1em;
  position: absolute;
  display: flex;
  align-items: center;
  justify-content: center;
  height: 2.2em;
  width: 2.2em;
  border-radius: 0.7em;
  box-shadow: 0.1em 0.1em 0.6em 0.2em #7a8cf3;
  right: 0.3em;
  transition: all 0.3s;
}

.contactButton:hover {
  transform: translate(-0.05em, -0.05em);
  box-shadow: 0.15em 0.15em #5566c2;
}

.contactButton:active {
  transform: translate(0.05em, 0.05em);
  box-shadow: 0.05em 0.05em #5566c2;
}
.noresult{
    left: 40px;
}

</style>
<body>
    <h1>Search Results for "<?php echo htmlspecialchars($query); ?>"</h1>
    <a href="index.php" class="roo"><i class="fas fa-arrow-left icon"></i> Back</a>
    
    <div id="results">
        <?php if (empty($results)): ?>
            <div  class="noresult" style="text-align: center;  white-space: nowrap; margin-top: 40px; margin-left: 95px;">
    <i class="fas fa-search-minus" style="font-size: 50px; color: gray;"></i>
    <p style="color: gray; font-size: 18px; margin-top: 10px;">No Results Found</p>
</div>

         
        <?php else: ?>
            <?php foreach ($results as $item): ?>
                <div class="product-card">
                    <?php if (!empty($item['image_path'])): ?>
                        <img src="<?php echo htmlspecialchars($item['image_path']); ?>" alt="Image of <?php echo htmlspecialchars($item['name']); ?>">
                    <?php endif; ?>
                    <div class="product-title"><?php echo htmlspecialchars($item['name']); ?></div>
                    <div class="product-description"><?php echo htmlspecialchars($item['description']); ?></div>
                    <a href="<?php echo htmlspecialchars($item['detail_page']); ?>">
             
        
<button class="contactButton">
View Details
  <div class="iconButton">
    <svg
      height="24"
      width="24"
      viewBox="0 0 24 24"
      xmlns="http://www.w3.org/2000/svg"
    >
      <path d="M0 0h24v24H0z" fill="none"></path>
      <path
        d="M16.172 11l-5.364-5.364 1.414-1.414L20 12l-7.778 7.778-1.414-1.414L16.172 13H4v-2z"
        fill="currentColor"
      ></path>
    </svg>
  </div>
</button>
</a>
</div>




            <?php endforeach; ?>
        <?php endif; ?>
    </div>
    <div class="loading" id="loading-animation">
        <svg class="loadin" width="64px" height="48px">
            <polyline
                points="0.157 23.954, 14 23.954, 21.843 48, 43 0, 50 24, 64 24"
                id="back"
            ></polyline>
            <polyline
                points="0.157 23.954, 14 23.954, 21.843 48, 43 0, 50 24, 64 24"
                id="front"
            ></polyline>
        </svg>
    </div>

    <script>
        // Automatically hide the loading animation after 5 seconds
        window.addEventListener("load", () => {
            setTimeout(() => {
                const loadingElement = document.getElementById("loading-animation");
                loadingElement.classList.add("hidden");
            }, 1500);
        });
    </script>
</body>
</html>

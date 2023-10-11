<?php

$filename = "file.txt";

function createOrOpenFile($filename) {
    $file = fopen($filename, "a+"); 
    if ($file === false) {
        echo "Error: Unable to create/open the file.";
    } else {
        echo "File created/opened successfully.";
        fclose($file);
    }
}

function readFileContent($filename) {
    if (file_exists($filename)) {
        $content = file_get_contents($filename);
        echo "File Content:\n$content";
    } else {
        echo "Error: The file does not exist.";
    }
}

function writeFileContent($filename, $content) {
    $file = fopen($filename, "w");
    if ($file === false) {
        echo "Error: Unable to open the file for writing.";
    } else {
        fwrite($file, $content);
        fclose($file);
        echo "Content written to the file successfully.";
    }
}

function appendToFile($filename, $content) {
    $file = fopen($filename, "a");
    if ($file === false) {
        echo "Error: Unable to open the file for appending.";
    } else {
        
        $contentWithLineBreak = $content . "\n";
        
        fwrite($file, $contentWithLineBreak);
        fclose($file);
        echo "Content appended to the file successfully.";
    }
}

function deleteFile($filename) {
    if (file_exists($filename)) {
        unlink($filename);
        echo "File deleted successfully.";
    } else {
        echo "Error: The file does not exist.";
    }
}

function copyFile($source, $destination) {
    if (file_exists($source)) {
        $sourceContent = file_get_contents($source);
        
        if (file_put_contents($destination, $sourceContent) !== false) {
            echo "File copied successfully.";
        } else {
            echo "Error: Unable to copy the file.";
        }
    } else {
        echo "Error: The source file does not exist.";
    }
}


function displayFileProperties($filename) {
    if (file_exists($filename)) {
       
        date_default_timezone_set('Asia/Kolkata');

        echo "File Size: " . filesize($filename) . " bytes<br>";
        echo "Last Modified: " . date("F d Y g:i:s A", filemtime($filename)) . " IST<br>";
    } else {
        echo "Error: The file does not exist.";
    }
}



$action = isset($_POST['action']) ? $_POST['action'] : '';

switch ($action) {
    case 'createOrOpen':
        createOrOpenFile($filename);
        break;
    case 'read':
        readFileContent($filename);
        break;
    case 'write':
        $content = isset($_POST['content']) ? $_POST['content'] : '';
        writeFileContent($filename, $content);
        break;
    case 'append':
        $content = isset($_POST['content']) ? $_POST['content'] : '';
        appendToFile($filename, $content);
        break;
    case 'delete':
        deleteFile($filename);
        break;
    case 'copy':
        $destination = isset($_POST['destination']) ? $_POST['destination'] : '';
        copyFile($filename, $destination);
        break;
    case 'displayProperties':
        displayFileProperties($filename);
        break;
    default:
        echo "Invalid action.";
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>File Handling</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        h1 {
            text-align: center;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        label {
            display: block;
            margin-bottom: 10px;
        }
        select, textarea, input[type="text"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }
        input[type="submit"] {
            background-color: #007BFF;
            color: #fff;
            border: none;
            padding: 10px 15px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <h1>File Handling</h1>
    <div class="container">
        <form method="POST">
            <label for="action">Select an action:</label>
            <select name="action">
                <option value="createOrOpen">Create/Open</option>
                <option value="read">Read</option>
                <option value="write">Write</option>
                <option value="append">Append</option>
                <option value="delete">Delete</option>
                <option value="copy">Copy</option>
                <option value="displayProperties">Display File Properties</option>
            </select>
            <input type="submit" value="Submit">
        </form>
        
        <form method="POST" style="margin-top: 20px;">
            <input type="hidden" name="action" value="write">
            <label for="content">Content to write/append:</label>
            <textarea name="content" rows="2" cols="30"></textarea>
            <input type="submit" value="Write">
        </form>
        <form method="POST" style="margin-top: 20px;">
            <input type="hidden" name="action" value="append">
            <label for="content">Content to append:</label>
            <textarea name="content" rows="2" cols="30"></textarea>
            <input type="submit" value="Append">
        </form>
        <form method="POST" style="margin-top: 20px;">
            <input type="hidden" name="action" value="copy">
            <label for="destination">Copy to destination:</label>
            <input type="text" name="destination">
            <input type="submit" value="Copy">
        </form>
    </div>
</body>
</html>
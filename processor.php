<?php
/**
 * Module 3: Server-Side Scripting Architecture (PHP Processing Engine)
 * Controls request capture vectors, array sanitization, and variable stream compiling.
 */

// Configure strict header rules to enforce standard document types
header("Content-Type: text/html; charset=UTF-8");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    
    // Sanitize input inputs to prevent Cross-Site Scripting (XSS) injections
    $raw_username = isset($_POST['username']) ? $_POST['username'] : 'Anonymous_Node';
    $raw_email    = isset($_POST['email']) ? $_POST['email'] : 'No_Route_Set';
    $raw_track    = isset($_POST['track']) ? $_POST['track'] : 'General_Computing';

    $clean_username = htmlspecialchars(trim($raw_username), ENT_QUOTES, 'UTF-8');
    $clean_email    = filter_var(trim($raw_email), FILTER_SANITIZE_EMAIL);
    $clean_track    = htmlspecialchars(trim($raw_track), ENT_QUOTES, 'UTF-8');

    // Simulate backend server evaluation logic processing
    $assigned_core = ($clean_track === 'systems') ? 'Cluster-Alpha (Nodes 0-31)' : 'Cluster-Beta (Nodes 32-63)';
    
    // Compile and stream the server-side document response back down the network pipe
    echo "<!DOCTYPE html>";
    echo "<html lang='en'>";
    echo "<head>";
    echo "    <meta charset='UTF-8'>";
    echo "    <title>Server-Side Response Pipeline</title>";
    echo "    <style>";
    echo "        body { font-family: sans-serif; background: #2c3e50; color: white; display: flex; justify-content: center; align-items: center; height: 100vh; margin: 0; }";
    echo "        .response-card { background: #34495e; padding: 40px; border-radius: 8px; box-shadow: 0 10px 25px rgba(0,0,0,0.3); max-width: 500px; width: 100%; }";
    echo "        h1 { color: #2ecc71; border-bottom: 2px solid #16a085; padding-bottom: 10px; font-size: 24px; }";
    echo "        .meta-field { margin: 15px 0; font-size: 16px; font-family: monospace; }";
    echo "    </style>";
    echo "</head>";
    echo "<body>";
    echo "    <div class='response-card'>";
    echo "        <h1>HTTP 200: Server Transmission Complete</h1>";
    echo "        <p>The host server system has processed the incoming request successfully.</p>";
    echo "        <div class='meta-field'><strong>Processed Name Node:</strong> " . $clean_username . "</div>";
    echo "        <div class='meta-field'><strong>Validated Address:</strong> " . $clean_email . "</div>";
    echo "        <div class='meta-field'><strong>Target Vector Track:</strong> " . strtoupper($clean_track) . "</div>";
    echo "        <div class='meta-field'><strong>Allocated Resource:</strong> " . $assigned_core . "</div>";
    echo "        <hr style='border: 1px solid #16a085; margin-top:20px;'>";
    echo "        <p style='font-size: 12px; color: #bdc3c7; text-align: center;'>Engine Execution Stamp: " . date('Y-m-d H:i:s') . " UTC</p>";
    echo "    </div>";
    echo "</body>";
    echo "</html>";

} else {
    // Graceful exception response routing block for illegal access attempts
    http_response_code(405);
    echo "<h1>Error 405: Method Not Allowed</h1>";
    echo "<p>Direct system access via standard HTTP GET vectors is strictly prohibited.</p>";
}
?>

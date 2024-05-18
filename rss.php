<?php
// Set the content type to XML
header("Content-type: text/xml");

// Create XML header
echo "<?xml version='1.0' encoding='UTF-8'?>";

// Create the RSS feed structure
echo "<rss version='2.0'>";
echo "<channel>";
echo "<title>put your domain idk</title>";
echo "<link>put your domain idk</link>"; // Fixed the link here
echo "<description>DisTube RSS</description>";

// Sample items - replace with your own logic to fetch items from your website
$items = array(
    array(
        'title' => 'Sample Post 1',
        'link' => 'put your domain idk',
        'description' => 'DisTube is A Video Sharing Platform That Looks Like 2005 YouTube!',
        'pubDate' => date('D, d M Y H:i:s O')
    ),
    array(
        'title' => 'Distube',
        'link' => 'put your domain idk', // Fixed the link here
        'description' => 'DisTube is A Video Sharing Platform That Looks Like 2005 YouTube!',
        'pubDate' => date('D, d M Y H:i:s O', strtotime('-1 day')) // Example date, adjust as needed
    )
);

// Output each item
foreach ($items as $item) {
    echo "<item>";
    echo "<title>" . $item['title'] . "</title>";
    echo "<link>" . $item['link'] . "</link>";
    echo "<description>" . $item['description'] . "</description>";
    echo "<pubDate>" . $item['pubDate'] . "</pubDate>";
    echo "</item>";
}

// Close the RSS feed structure
echo "</channel>";
echo "</rss>";
?>

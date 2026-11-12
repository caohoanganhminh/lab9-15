<?php
require __DIR__.'/config.php';
header('Content-Type: application/rss+xml; charset=utf-8');
function xml($value){return htmlspecialchars($value,ENT_XML1|ENT_COMPAT,'UTF-8');}
$result=$conn->query('SELECT title,link,description FROM news ORDER BY id DESC');
echo '<?xml version="1.0" encoding="UTF-8"?>'."\n";
?>
<rss version="2.0"><channel>
<title>Website thực hành PHP</title><link>http://localhost/Bai_9_den_15/</link>
<description>Tin tức và bài thực hành PHP</description>
<?php while($row=$result->fetch_assoc()):?>
<item><title><?=xml($row['title'])?></title><link><?=xml($row['link'])?></link><description><?=xml($row['description'])?></description></item>
<?php endwhile;?>
</channel></rss>

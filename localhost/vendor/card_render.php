<?php
echo "<div onclick=\"document.location.href='/post.php?id=" . $row["post_id"] . "'\" class=\"card\" style=\"width: 18rem;\">";

echo "<div class=\"card-header\">";
echo "<div class=\"user_date\">";
echo "<a href=\"/user.php?id=" . $row["id"] . "\" class=\"author\">" . $row["login"] . "</a>";
echo "<div>" . $row["create_date"] . "</div>";
echo "</div>";
echo "<h3 class=\"card-title\">" . $row["title"] . "</h3>";
echo "</div>";
if ($row["content"]) {

    echo "<div class=\"card-body\">";
    echo "<p class=\"card-text\" >" . $row["content"] . "</p>";
    echo "</div>";
}
echo "</div>";

<?php
echo "<div class=\"card\" style=\"width: 18rem;\">";

echo "<div class=\"card-header\">";

echo "<div class=\"user_date\">";
echo '<img class="avatar post" src="uploaded_files/' . $row["photo_url"] . '" alt="Фото профиля">';
echo "<a href=\"/user.php?id=" . $row["id"] . "\" class=\"author\">" . $row["login"] . "</a>";
echo "<a href='/post.php?id=" . $row["post_id"] . "'\">" . $row["create_date"] . "</a>";

echo "</div>";

echo "</div>";

echo "<div class=\"card-body\">";
echo "<h3 class=\"card-title\">" . $row["title"] . "</h3>";
echo "</div>";
if ($row["content"]) {

    echo "<div class=\"card-body\">";
    echo "<p class=\"card-text\" >" . $row["content"] . "</p>";
    echo "</div>";
}
echo "</div>";

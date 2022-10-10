<footer>
    <div class = "menu-footer">
        <ul>
        <?php if (validAuthorization ()) :?>
            <?=showMenu(arraySort($mainMenu, 'title', SORT_DESC));?>
        <?php else :?>
            <?=showMenuBeforeAuthorization(arraySort($mainMenu, 'title', SORT_DESC));?>
        <?php endif; ?>
        </ul>
    </div>
</footer>
</html>

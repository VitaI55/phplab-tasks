<?php for ($i = 1; $i < $pageCount; $i++): ?>
    <li class="page-item">
        <a class="page-link"
           href="?page=<?= $i ?>&filter_by_state=<?= $_GET['filter_by_state'] ?>&filter_by_first_letter=<?= $_GET['filter_by_first_letter'] ?>">
            <?= $i ?>
        </a>
    </li>
<?php
endfor; ?>
<?php for ($i = 1; $i < $pageCount; $i++): ?>
    <li class="page-item">
        <a class="page-link" href="?page=<?= $i ?>&filter_by_state=<?= $_GET['filter_by_state'] ?>">
            <?= $i ?>
        </a>
    </li>
<?php
endfor; ?>
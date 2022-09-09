<?php

function h($stmt) {
    htmlspecialchars($stmt, ENT_QUOTES, 'UTF-8');
}
<?php require base_path('views/partials/head.php')  ?>
<?php require base_path('views/partials/nav.php')  ?>
<?php require base_path('views/partials/banner.php')  ?>

<main>
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
        <p>
            <a href="/notes" class="text-blue-500 hover:underline">Go back</a>
        </p>
        <p class="text-blue-500">
            <?= $note['body'] ?>
        </p>
        <p>
        <form method="post" class="mt-7">
            <input type="hidden" name="id" id="id" value="<?= $note['id'] ?>">
            <button class="text-sm text-red-500" type="submit">Delete</button>
        </form>
        </p>
    </div>
</main>

<?php require base_path('views/partials/foot.php')  ?>
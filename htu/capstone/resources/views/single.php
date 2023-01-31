<div class="my-5">
    <!-- for public -->
    <h1 class="text-center mb-5">
        <?= $data->product->products_name ?>
    </h1>

    <?php if (!empty($data->product->author)) : ?>
        <p class="mb-3">
            Author: <?= $data->product->author ?>
        </p>
    <?php endif; ?>

    <p class="mb-3">
        Created: <?= $data->product->created_at ?>
    </p>

    <p class="mb-3">
        Tags: <?php
                foreach ($data->product->tags as $tag) {
                    echo "#$tag ";
                }
                ?>
    </p>

    <p>
        <?= $data->post->content ?>
    </p>
</div>
<?php

get_header();

$arr['arguments']['get_check_post_permission'] = $_GET['token'];
$arr['arguments']['post_id'] = get_the_ID();
$arr['arguments']['post_token_uri'] = get_field('token');
$arr['arguments']['status'] = get_field('status_post');
$arr['arguments']['post_is_create_uri'] = get_permalink() . '?token=' . $arr['arguments']['post_token_uri'];

$arr['fields']['name_1'] = get_field('name-1');
$arr['fields']['name_2'] = get_field('name-2');
$arr['fields']['name_3'] = get_field('name-3');
$arr['fields']['name_4'] = get_field('name-4');
$arr['fields']['name_5'] = get_field('name-5');
$arr['fields']['name_6'] = get_field('name-6');
$arr['fields']['name_7'] = get_field('name-7');
$arr['fields']['name_8'] = get_field('name-8');
$arr['fields']['name_9'] = get_field('name-9');
$arr['fields']['name_10'] = get_field('name-10');


dd($arr);

?>

<?= '<br>single form' ?>


    <br><br><br><br><br>
<?php
if ($arr['arguments']['get_check_post_permission'] === $arr['arguments']['post_token_uri']) {
    if ($arr['arguments']['status'] === 'saved') {
        ?>
        <form id="apply">
            <input type="hidden" name="var" value="<?= $arr['arguments']['post_id'] ?>">
            <label for="name-1">name-1 label</label>
            <input type="text" name="name-1" id="name-1" value="<?= $arr['fields']['name_1'] ?>">
            <br><br>
            <label for="name-2">name-2 label</label>
            <input type="text" name="name-2" id="name-2" value="<?= $arr['fields']['name_2'] ?>">
            <br><br>
            <label for="name-3">name-3 label</label>
            <input type="text" name="name-3" id="name-3" value="<?= $arr['fields']['name_3'] ?>">
            <br><br>
            <label for="name-4">name-4 label</label>
            <input type="text" name="name-4" id="name-4" value="<?= $arr['fields']['name_4'] ?>">
            <br><br>
            <label for="name-5">name-5 label</label>
            <input type="text" name="name-5" id="name-5" value="<?= $arr['fields']['name_5'] ?>">
            <br><br>
            <label for="name-6">name-6 label</label>
            <input type="text" name="name-6" id="name-6" value="<?= $arr['fields']['name_6'] ?>">
            <br><br>
            <label for="name-7">name-7 label</label>
            <input type="text" name="name-7" id="name-7" value="<?= $arr['fields']['name_7'] ?>">
            <br><br>
            <label for="name-8">name-8 label</label>
            <input type="text" name="name-8" id="name-8" value="<?= $arr['fields']['name_8'] ?>">
            <br><br>
            <label for="name-9">name-9 label</label>
            <input type="text" name="name-9" id="name-9" value="<?= $arr['fields']['name_9'] ?>">
            <br><br>
            <label for="name-10">name-10 label</label>
            <input type="text" name="name-10" id="name-10" value="<?= $arr['fields']['name_10'] ?>">
            <br><br><br><br>
            <a class="submit-js" style="cursor: pointer">Save Draft</a>
            <br><br><br>
            <a class="submit-js" style="cursor: pointer">Apply</a>
        </form>
        <?php
    } else {
        ?>
        <h1><?= google_translate('Ваша форма успешно отправлена!!! - Спасибо', 'ru', 'en') ?></h1>
        <?php
    }
} elseif ($arr['arguments']['get_check_post_permission'] === null) {
    ?>
    <h1><?= google_translate('У вас нет токена', 'ru', 'en') ?></h1>
    <?php
} elseif ($arr['arguments']['get_check_post_permission'] === '') {
    ?>
    <h1><?= google_translate('У вас нет токена или строка токена в ссылке пустая', 'ru', 'en') ?></h1>
    <?php
} elseif ($arr['arguments']['get_check_post_permission'] !== $arr['arguments']['post_token_uri']) {
    ?>
    <h1><?= google_translate('У вас не верный токен для редактирования', 'ru', 'en') ?></h1>
    <?php
}
?>
    <br><br><br><br><br>


<?php get_footer();

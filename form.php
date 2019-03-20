<?php
/**
 * Template Name: apply
 */

get_header(); ?>

<?= '<br>apply form' ?>


    <br><br><br><br><br>

    <form id="apply">
        <input type="hidden" name="var" value="false">
        <label for="name-1">name-1 label</label>
        <input type="text" name="name-1" id="name-1" required>
        <br><br>
        <label for="name-2">name-2 label</label>
        <input type="text" name="name-2" id="name-2" required>
        <br><br>
        <label for="name-3">name-3 label</label>
        <input type="text" name="name-3" id="name-3">
        <br><br>
        <label for="name-4">name-4 label</label>
        <input type="text" name="name-4" id="name-4">
        <br><br>
        <label for="name-5">name-5 label</label>
        <input type="text" name="name-5" id="name-5">
        <br><br>
        <label for="name-6">name-6 label</label>
        <input type="text" name="name-6" id="name-6">
        <br><br>
        <label for="name-7">name-7 label</label>
        <input type="text" name="name-7" id="name-7">
        <br><br>
        <label for="name-8">name-8 label</label>
        <input type="text" name="name-8" id="name-8">
        <br><br>
        <label for="name-9">name-9 label</label>
        <input type="text" name="name-9" id="name-9">
        <br><br>
        <label for="name-10">name-10 label</label>
        <input type="text" name="name-10" id="name-10">
        <br><br><br><br>
        <a class="submit-js" style="cursor: pointer">Save Draft</a>
        <br><br><br>
        <a class="submit-js" style="cursor: pointer">Apply</a>
    </form>

    <br><br><br><br><br>


<?php get_footer();

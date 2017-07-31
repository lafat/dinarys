<template>
    <div class="row">
        <div class="col-md-3">
            <div class="img_container">
                <img :src="photo">
            </div>
        </div>
        <div class="col-md-9">
            <h3>Привет, меня зовут Роман<br><small><i>и я ищу работу</i></small></h3>
            <p>Это мое тестовое задание в одну из компаний. Задачей было следующее:</p>
            <p>Реализовать REST API клиент работы с серверной частью.
                Создание SPA для регистрации, авторизации, редактирования пользователя. Внесения наборов измерений. Просмотра набора измерений и вычислений наборов с максимальным периметром.</p>

        </div>
    </div>
</template>

<style>
    .img_container img {
        width: 100%;
        height: auto;
    }
</style>

<script>
    export default {
        data () {
            return {
                description: '',
                photo: '/upload/images/me.jpg',

            }

        }
    }
</script>
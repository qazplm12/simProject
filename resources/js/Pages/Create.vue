<template>
    <InertiaLink href="/" class="text-indigo-600 hover:text-indigo-700 font-semibold mr-4">메인으로</InertiaLink>
    <div>
        <h1 class="text-3xl bg-gray-500 m-5">차량 등록 페이지</h1>
        <form @submit.prevent="register" class="m-5">
            <label for="brand">제조사:</label>
            <select id="brand" v-model="carData.brand" class="block border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                <option value="">제조사 선택</option>
                <option v-for="brand in brands" :key="brand">{{ brand }}</option>
            </select>
            <br>
            <label for="model">모델:</label>
            <input type="text" id="model" v-model="carData.model" required class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
            <br>
            <label for="registrationNumber">차량 번호:</label>
            <input type="text" id="registrationNumber" v-model="carData.registrationNumber" required class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
            <br>
            <label for="year">년식:</label>
            <select id="year" v-model="carData.year" class="block border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                <option value="">년식 선택</option>
                <option v-for="year in years" :key="year">{{ year }}</option>
            </select>
            <br>
            <label>색상:</label>
            <div class="color-picker">
                <button v-for="color in colors" :key="color" :style="{ backgroundColor: color, opacity: carData.color === color ? 1 : 0.6 }" @click="selectColor(color)"></button>
            </div>
            <br>
            <button type="submit" class="mt-5 px-4 py-2 bg-indigo-600 rounded-md hover:bg-indigo-700">등록</button>
        </form>
    </div>
</template>

<script setup>
import { ref } from 'vue';
import axios from 'axios';
import { InertiaLink } from '@inertiajs/inertia-vue3';

const carData = ref({
    brand: '',
    model: '',
    registrationNumber: '',
    year: '',
    color: ''
});

const selectColor = (color) => {
    carData.value.color = color;
};

const register = () => {
    axios.post('/cars', carData.value)
        .then((response) => {
            console.log(response);
            alert('데이터 통신만 확인 데이터베이스에 저장안됨');
            history.back();
        })
        .catch((err) => {
            console.log(err);
        });
};

const brands = ['현대', '기아', '제네시스', 'KGM', '르노코리아'];
const years = ['2024', '2023', '2022', '2021', '2020', '2019', '2018', '2017', '2016', '2015', '2014'];
const colors = ['red', 'blue', 'green', 'yellow', 'orange', 'purple', 'pink', 'brown', 'black', 'white'];
</script>

<style scoped>
.color-picker {
    display: flex;
    margin-bottom: 10px;
}

.color-picker button {
    width: 30px;
    height: 30px;
    cursor: pointer;
    border: 1px solid #000000;
}

.color-picker button:hover {
    opacity: 1;
}
</style>

<template>
    <InertiaLink href="/" class="text-indigo-600 hover:text-indigo-700 font-semibold mr-4">메인으로</InertiaLink>
    <div>
        <h1 class="text-3xl bg-gray-500 m-5">차량 예약</h1>
        <form @submit.prevent="submitReservation" class="m-5">
            <label for="startDate">예약 시작일:</label>
            <input type="date" id="startDate" v-model="startDate" class="border border-gray-300 rounded-md p-1">
            <input type="time" id="startTime" v-model="startTime" class="border border-gray-300 rounded-md p-1 ml-2">
            <br>
            <label for="endDate">예약 종료일:</label>
            <input type="date" id="endDate" v-model="endDate" class="border border-gray-300 rounded-md p-1">
            <input type="time" id="endTime" v-model="endTime" class="border border-gray-300 rounded-md p-1 ml-2">
            <br>
            <button type="submit" class="mt-5 px-4 py-2 bg-indigo-600 rounded-md hover:bg-indigo-700">예약</button>
        </form>
    </div>
</template>

<script setup>
import { ref } from 'vue';
import axios from 'axios'
import {InertiaLink} from "@inertiajs/inertia-vue3";

// db 구현 실패 임시데이터로 대체..
const car = { id: 1, brand: '현대', model: '그랜저', year: '2023', color: '블랙', image: 'car1.jpg' }

const startDate = ref('');
const endDate = ref('');
const startTime = ref('');
const endTime = ref('');

const submitReservation = () => {
    const reservationData = {
        startDate: startDate.value,
        startTime: startTime.value,
        endDate: endDate.value,
        endTime: endTime.value
    };
    // Car 모델과 Reservation 모델 연동 미구현
    axios.post(`/cars/${car.id}/reservations`, reservationData)
        .then(response => {
            console.log(response.data);
            alert('예약성공');
        })
        .catch(error => {
            console.error(error);
        });
};
</script>

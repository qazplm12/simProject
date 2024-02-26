<template>
    <InertiaLink href="/" class="text-indigo-600 hover:text-indigo-700 font-semibold mr-4">메인으로</InertiaLink>
    <div>
        <h1 class="text-3xl bg-gray-500 m-5">차량 상세 정보</h1>
        <div v-if="car">
            <div class="bg-white rounded-lg shadow-md p-4">
                <img :src="car.image" alt="Car Image" class="w-full h-40 object-cover mb-2">
                <h3 class="text-lg font-semibold">{{ car.brand }} {{ car.model }}</h3>
                <p class="text-gray-600">{{ car.year }}년식 / {{ car.color }}</p>
                <InertiaLink :href="`/reservation/${car.id}`" class="mt-4 px-4 py-2 bg-indigo-600 rounded-md text-white hover:bg-indigo-700">예약</InertiaLink>
            </div>
        </div>
    </div>
</template>

<script setup>
import { onMounted } from 'vue';
import { InertiaLink } from '@inertiajs/inertia-vue3';
import axios from 'axios';

const car = { id: 1, brand: '현대', model: '그랜저', year: '2023', color: '블랙', image: 'car1.jpg' }

const fetchCarInfo = async () => {
    const response = await axios.get(`/cars/${car.id}`);
    car.value = response.data;
};

onMounted(() => {
    fetchCarInfo();
});
</script>

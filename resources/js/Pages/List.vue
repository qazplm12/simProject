<template>
    <div>
        <InertiaLink href="/create" class="text-indigo-600 hover:text-indigo-700 font-semibold mr-4">차량 등록</InertiaLink>
        <div class="flex justify-between">
            <div class="w-1/4 p-4 pt-6">
                <h2 class="text-lg font-semibold mb-4">예약 기간</h2>
                <div class="mb-4">
                    <label for="startDate">예약 시작일:</label>
                    <input type="date" id="startDate" v-model="startDate" class="border border-gray-300 rounded-md p-1">
                    <input type="time" id="startTime" v-model="startTime" step="1800" class="border border-gray-300 rounded-md p-1 ml-2">
                </div>
                <div>
                    <label for="endDate">예약 종료일:</label>
                    <input type="date" id="endDate" v-model="endDate" class="border border-gray-300 rounded-md p-1">
                    <input type="time" id="endTime" v-model="endTime" step="1800" class="border border-gray-300 rounded-md p-1 ml-2">
                </div>
            </div>

            <div class="w-3/4 p-4">
                <h2 class="text-lg font-semibold mb-4">등록된 차량 목록</h2>
                <div class="grid grid-cols-2 gap-4">
                    <div v-for="car in cars" :key="car.id" class="bg-white rounded-lg shadow-md p-4">
                        <img :src="car.image" alt="Car Image" class="w-full h-40 object-cover mb-2">
                        <h3 class="text-lg font-semibold">{{ car.brand }} {{ car.model }}</h3>
                        <p class="text-gray-600">{{ car.year }}년식 / {{ car.color }}</p>
                        <InertiaLink :href="`/show/${car.id}`" class="mt-4 px-4 py-2 bg-indigo-600 rounded-md text-white hover:bg-indigo-700">예약</InertiaLink>
                    </div>
                </div>
                <button v-if="showMore" @click="loadMore" class="mt-4 px-4 py-2 bg-gray-300 text-gray-700 rounded-md hover:bg-gray-400">더 보기</button>
            </div>
        </div>
    </div>
</template>

<script setup>
import { ref } from 'vue';
import { InertiaLink } from '@inertiajs/inertia-vue3';

const startDate = ref('');
const endDate = ref('');
const startTime = ref('');
const endTime = ref('');

// db 구현 실패 임시데이터로 대체
const cars = ref([
    { id: 1, brand: '현대', model: '그랜저', year: '2023', color: '블랙', image: 'car1.jpg' },
    { id: 2, brand: '기아', model: 'K5', year: '2022', color: '화이트', image: 'car2.jpg' },
    { id: 3, brand: 'BMW', model: '5시리즈', year: '2023', color: '핑크', image: 'car3.jpg' },
    { id: 4, brand: '벤츠', model: 'E클래스', year: '2022', color: '퍼플', image: 'car4.jpg' }
]);

// 더보기 버튼
const showMore = ref(true);

const loadMore = () => {
    cars.value.push(
        { id: 5, brand: '아우디', model: 'A4', year: '2023', color: '블루', image: 'car5.jpg' },
        { id: 6, brand: '토요타', model: '캠리', year: '2022', color: '그린', image: 'car6.jpg' },
        { id: 7, brand: '르노', model: '메간', year: '2023', color: '옐로우', image: 'car7.jpg' },
        { id: 8, brand: '포르쉐', model: '파나메라', year: '2022', color: '레드', image: 'car8.jpg' }
    );
    showMore.value = false;
};
</script>

<style>

</style>

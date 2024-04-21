<template>
  <div class="rating-component">
    <h2>Rate your experience</h2>
    <div class="rating-section">
      <label>Rating:</label>
      <div class="star-rating">
        <span
          v-for="star in 5"
          :key="star"
          @click="setRating(star)"
          :class="{ filled: star <= rating }"
          >&#9733;</span
        >
      </div>
    </div>
    <textarea
      placeholder="Add your comment..."
      v-model="comment"
      class="comment-textarea"
      rows="4"
      cols="50"
    ></textarea>
    <button @click="handleSubmit(rideId)" class="submit-button">Submit</button>
  </div>
</template>
  
  <script setup>
import { ref, defineProps } from "vue";
import axios from "axios";
const rating = ref(0); // Default value
const comment = ref("");

const props = defineProps({
  rideId: Number,
});

const setRating = (star) => {
  rating.value = star;
};

const handleSubmit = (id) => {
  const data = {
    commentaire: comment.value,
    note: rating.value,
    idUser: id, // Assuming you have the user ID available
  };

  axios
    .post("http://localhost:8000/api/avis", data)
    .then((response) => {
      console.log("Avis submitted successfully:", response.data);
      // Handle any success actions here
    })
    .catch((error) => {
      console.error("Error submitting avis:", error);
      // Handle any error actions here
    });
};
</script>
  
  
  <style scoped>
.rating-component {
  max-width: 400px;
  margin: 0 auto;
  padding: 20px;
  background-color: #f9f9f9;
  border: 1px solid #ddd;
  border-radius: 5px;
}

.rating-section {
  margin-bottom: 20px;
}

.star-rating {
  font-size: 24px;
}

.star-rating span {
  color: #ccc;
  cursor: pointer;
  transition: color 0.3s ease;
}

.star-rating span.filled {
  color: #ffdd44;
}

.comment-textarea {
  width: 100%;
  padding: 8px;
  font-size: 16px;
  border: 1px solid #ccc;
  border-radius: 4px;
}

.submit-button {
  padding: 10px 20px;
  font-size: 16px;
  background-color: #007bff;
  color: #fff;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  transition: background-color 0.3s ease;
}

.submit-button:hover {
  background-color: #0056b3;
}
</style>
  
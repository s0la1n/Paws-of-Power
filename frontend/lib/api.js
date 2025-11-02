import axios from 'axios';

const apiClient = axios.create({
    baseURL: 'http://localhost:8000/api',
    withCredentials: true,
});

export const getPosts = async () => {
    const response = await apiClient.get('/posts');
    return response.data;
};

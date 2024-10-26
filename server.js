const express = require('express');
const { createProxyMiddleware } = require('http-proxy-middleware');

const app = express();

// CORS middleware
app.use((req, res, next) => {
    res.header('Access-Control-Allow-Origin', '*'); // Change * to specific origin if needed
    res.header('Access-Control-Allow-Headers', 'Origin, X-Requested-With, Content-Type, Accept');
    next();
});

// Proxy middleware
app.use('/api', createProxyMiddleware({
    target: 'https://fielddesk.in',
    changeOrigin: true,
    pathRewrite: {
        '^/api': '', // remove /api prefix when forwarding the request
    },
}));

const PORT = 3000;
app.listen(PORT, () => {
    console.log(`Proxy server is running on http://localhost:${PORT}`);
});

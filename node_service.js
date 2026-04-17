// Load the Environment Variables for DB connection
require('dotenv').config();
const express = require('express');
const mysql = require('mysql2');
const app = express();

// For parsing JSON
app.use(express.json());

// Create a connection pool to the DB
const pool = mysql.createPool({
    host: process.env.DB_HOST,
    user: process.env.DB_USER,
    password: process.env.DB_PASS,
    database: process.env.DB
});

// Routes
/**
 * GET /api/products
 * Fetches all of the products
 */
app.get('/api/products', (req, res) => {
    pool.query('SELECT * FROM products', (err, result) => {
        if (err) return res.status(500).json({ error: 'Database error' });
        res.json(result);
    });
});
/**
 * POST /api/products
 * Add new item
 */
app.post('/api/products', (req, res) => {
    const { name, price, stock_count, description } = req.body;
    const sql = 'INSERT INTO products (name, price, stock_count, description) VALUES (?, ?, ?, ?)';
    pool.query(sql, [name, price, stock_count, description], (err, result) => {
        if (err) return res.status(500).json({ error: err.message });
        res.status(201).json({ id: result.insertId, message: "Product created "});
    });
});

const PORT = process.env.PORT || 3000;
app.listen(PORT, () => console.log(`Server running on: http://localhost:${PORT}`));
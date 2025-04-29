const express = require('express');
const app = express();
const dotenv = require('dotenv');
const mailRoutes = require('./routes/mailRoutes');

dotenv.config();

app.use(express.urlencoded({ extended: true }));
app.use(express.json());

app.use('/mail', mailRoutes);

app.get('/', (req, res) => {
  res.sendFile(__dirname + '/views/index.html');
});

const PORT = process.env.PORT || 3000;
app.listen(PORT, () => {
  console.log(`Server running on http://localhost:${PORT}`);
});
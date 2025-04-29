const nodemailer = require('nodemailer');

exports.sendMail = async (req, res) => {
  const { to, subject, message } = req.body;

  let transporter = nodemailer.createTransport({
    service: 'gmail',
    auth: {
      user: process.env.EMAIL_USER,
      pass: process.env.EMAIL_PASS
    }
  });

  let mailOptions = {
    from: process.env.EMAIL_USER,
    to,
    subject,
    text: message
  };

  try {
    await transporter.sendMail(mailOptions);
    res.send('Email sent successfully!');
  } catch (err) {
    console.error(err);
    res.status(500).send('Failed to send email');
  }
};
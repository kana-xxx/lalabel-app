module.exports = {
    plugins: {
      tailwindcss: {
        content: ["./resources/**/*.blade.php","./resources/**/*.js"],
           theme: {
           extend: {},
           },
      },
      autoprefixer: {},
    },
  };
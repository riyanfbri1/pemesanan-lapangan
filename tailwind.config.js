/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        "./resources/**/*.blade.php",
        "./src/**/*.{html,js}",
        "./node_modules/tw-elements/dist/js/**/*.js",
    ],
    theme: {
        extend: {
            colors: {
              header:"#297987",
                primary: "#29302E",
                latarbelakang: "#B9ECEA",
              footer:"#559DAB",
            },
        },
        fontFamily: {
            Inter: ["Inter"],
        },
    },
    plugins: [require("tw-elements/dist/plugin")],
};

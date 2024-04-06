
import puppeteer from 'puppeteer';


(async () => {
    // Iniciar el navegador Puppeteer
    const browser = await puppeteer.launch({headless: true}); 

    // Abrir una nueva página
    const page = await browser.newPage();

    // Navegar a una URL específica
    await page.goto('https://www.google.com/imghp?hl=es-419&tab=ri&authuser=0&ogbl');

    // Tomar una captura de pantalla de la página
    await page.screenshot({ path: 'example.png' });

    // Cerrar el navegador
    await browser.close();
})();
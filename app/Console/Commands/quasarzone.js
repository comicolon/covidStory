
const mysql = require('mysql');  // mysql 모듈 로드
const conn = {  // mysql 접속 설정
    host: 'localhost',
    port: '3306',
    user: 'root',
    password: 'comicolon78',
    database: 'covidrun'
};

var connection = mysql.createConnection(conn); // DB 커넥션 생성
connection.connect();   // DB 접속

// puppeteer을 가져온다.
const puppeteer = require('puppeteer');
const cheerio = require('cheerio');

function delay(time) {
    return new Promise(function(resolve) {
        setTimeout(resolve, time)
    });
}

(async() => {
    // 브라우저를 실행한다.
    // 옵션으로 headless모드를 끌 수 있다.
    const browser = await puppeteer.launch({
        headless: false,
        args: ['--no-sandbox']
    });

    // 새로운 페이지를 연다.
    const page = await browser.newPage();
    // 페이지의 크기를 설정한다.
    await page.setViewport({
        width: 1366,
        height: 768
    });
    await page.goto('https://quasarzone.com/bbs/qb_saleinfo');

    // 페이지의 HTML을 가져온다.
    const content = await page.content();
    // $에 cheerio를 로드한다.
    const $ = cheerio.load(content);
    // 복사한 리스트의 Selector로 리스트를 모두 가져온다.
    const lists = $("div.market-type-list.market-info-type-list.relative > table > tbody > tr");

    var qszArr = [];
    // 모든 리스트를 순환한다.
    lists.each((index, list) => {

        const title = $(list).find('td:nth-child(2) > div > div.market-info-list-cont > p > a > span.ellipsis-with-reply-cnt').text().trim();
        let url = $(list).find('td:nth-child(2) > div > div.market-info-list-cont > p > a').attr('href');
        url = 'https://quasarzone.com' + url;
        let category = $(list).find('td:nth-child(2) > div > div.market-info-list-cont > div > p:nth-child(1) > span.category').text().trim();
        let writer = $(list).find('td:nth-child(2) > div > div.market-info-list-cont > div > p:nth-child(2) > span.user-nick-wrap.nick.d-inline-block').attr('data-nick');
        let num = url.substring(45);

        let arr = {
                    title : title,
                    url : url,
                    category : category,
                    writer : writer,
                    num : num,
        }
        let query = "INSERT INTO deal_quasarzones (`title`, `url`, `category`, `writer`, `num`) VALUES (?, ?, ?, ?, ?)";

        var values = [
            title,
            url,
            category,
            writer,
            num
        ];

        connection.query(query, values, function (err, results, fields) { // testQuery 실행
            if (err) {
                console.log(err);
            }
            console.log(results);
        });



    });

    console.log('before waiting');
    await delay(4000);
    console.log('after waiting');

    connection.end(); // DB 접속 종료
    await  browser.close();

})();



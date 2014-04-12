<!--style-->
<style>
    #block-calendar .banner .more {
        overflow: visible;
        margin: -1px 8px 0 0;
        padding: 0;
    }

    #btn-sign-calendar {
        display: inline-block;
        *display: inline;
        float: none;
    }

    #item-date-calendar {
        display: inline-block;
        *display: inline;
        font-size: 32px;
        font-weight: bold;
        font-family: Michroma, 'Segoe UI Light', 'Segoe UI', 'Segoe UI WP', 'Microsoft Jhenghei', '΢���ź�', sans-serif, Times;
        line-height: 1.5;
        letter-spacing: -0.1em;
        text-align: left;
        color: #333;
    }

    #item-subdate-calendar {
        font-size: 14px;
        font-family: Michroma, 'Segoe UI Light', 'Segoe UI', 'Segoe UI WP', 'Microsoft Jhenghei', '΢���ź�', sans-serif, Times;
        font-style: italic;
        line-height: 1.2;
        letter-spacing: -0.1em;
        text-align: left;
        color: #666;
        margin: 0 0 8px 0;
    }

    #table {
        font-family: "Consolas", "Microsoft Yahei", Arial, sans-serif;
        position: relative;
        width: 100%;
    }

    #table tr {
        position: relative;
    }

    #good {
        background-color: #ffa;
    }

    #bad {
        background-color: #ffddd3;
    }

    #table .left {
        background-color: #fe4;
        color: #222;
        font-size: 48px;
        font-weight: bold;
        line-height: normal;
        width: 30%;
        height: 100%;
        text-align: center;
        vertical-align: middle;
        text-shadow: 0 1px 1px rgba(0, 0, 0, 0.5);
    }

    #bad .left {
        background-color: #f44;
        color: #fff;
    }

    #table .right {
        width: 70%;
        vertical-align: middle;
    }

    #table .a {
        display: block;
        color: #444;
        font-size: 24px;
        font-weight: bold;
        width: auto;
        height: auto;
        line-height: 1.2;
        margin: 8px 16px 0;
        padding: 0;
    }

    #table .b {
        display: block;
        color: #777;
        font-size: 14px;
        font-style: italic;
        width: auto;
        height: auto;
        line-height: 1.2;
        margin: 4px 16px 8px;
        padding: 0;
    }

    #table .c {
        max-width: 56px;
        max-height: 56px;
        *width: auto;
        *height: auto;
        display: block;
        margin: 0 8px 8px 16px;
        float: left;
    }

    #item-sign-calendar {
        font-family: "Consolas", "Microsoft Yahei", Arial, sans-serif;
        font-size: 48px;
        font-weight: bold;
        line-height: normal;
        width: auto;
        height: auto;
        text-align: right;
        text-shadow: 0 1px 1px rgba(0, 0, 0, 0.3);
        cursor: default;
        user-select: none;
        letter-spacing: -0.1em;
    }
</style>
<!--style-->

<!--html-->
<div id="area-top-calendar">
    <div class="l">
        <p id="item-date-calendar"></p>

        <p id="item-subdate-calendar"></p>
    </div>
    <div class="r">
        <p id="item-sign-calendar"></p>
    </div>
    <span class="clearfix"></span>
</div>

<table id="table">
    <tbody valign="middle">
    <tr id="good">
        <td class="left">��</td>
        <td class="right">
            <ul></ul>
        </td>
    </tr>
    <tr id="bad">
        <td class="left">��</td>
        <td class="right">
            <ul></ul>
        </td>
    </tr>
    </tbody>
</table>
<!--html-->

<!--script-->
<script>
system.tv = function () {
    //set handle
    var block = $('#block-calendar');
    var mainer = block.find('div.mainer').eq(0);
    var d = new Date();
    var seed = d.getFullYear() * 37621 + (d.getMonth() + 1) * 539 + d.getDate();
    //
    var list = [
        {name: "��AV", good: "�ͷ�ѹ������������", bad: "�ᱻ����ײ��"},
        {name: "��ģ��", good: "���������������", bad: "���񲻼��а����������"},
        {name: "Ͷ�������", good: "����Բ�����", bad: "�ᱻ�����˷���"},
        {name: "��������", good: "����ҲҪ���ⱱ", bad: "����ɥʬ��ɹ��"},
        {name: "��Ů������", good: "Ů��øж�����", bad: "��ȥϴ���ˣ��Ǻ�"},
        {name: "žžž", good: "žžžžžžž", bad: "�Ῠ������"},
        {name: "��ҹ", good: "ҹ���Ч�ʸ���", bad: "�����к���Ҫ����"},
        {name: "����", good: "�˷��Ӹ������������", bad: "�����˼���"},
        {name: "ɢ��", good: "��������������ڨ", bad: "��·��ȵ�ˮ��"},
        {name: "����λ��", good: "���������Ϸ�500", bad: "�ҷ����˹һ�"},
        {name: "�㱨����", good: "���佱��������", bad: "�ϰ�͵����Ϸ���۹���"},
        {name: "����è��", good: "�Ų�������������", bad: "�������޴�������"},
        {name: "�޹�", good: "����Ů���޹���ڨ", bad: "������ش�С�㱻����"},
        {name: "���", good: "�ڰ����������������", bad: "�ѵ�����ǡ��������ǿ��ɣ�"},
        {name: "���", good: "��ʵ��Ҳϲ����þ���", bad: "�Բ�������һ������"},
        {name: "��վ����", good: "������������", bad: "�յ������«��"},
        {name: "׷�·�", good: "���֮ǰ�Ҿ�������", bad: "�ᱻ��͸"},
        {name: "���ճ�", good: "ŭ����ҳ", bad: "�ᱻ�ϰ巢��"},
        {name: "�¸���", good: "���Ĭ��һ��ͨ��", bad: "�ᱻ��ɢ��"},
        {name: "��ɳ��", good: "ɳ�����ֵ����鷢", bad: "�ᱻ�������߳�play"},
        {name: "����", good: "��Ʒ�����", bad: "�����Ʒ��Ҫ�˻�"},
        {name: "����", good: "�¹��������������", bad: "����һ�̾ͼ�н��"},
        {name: "����", good: "֪ʶ��������", bad: "ע������ȫ�޷�����"},
        {name: "��˯", good: "��˯����������", bad: "���ڰ�ҹ������Ȼ��ʧ��"},
        {name: "���", good: "�����������Ż�", bad: "����������"}
    ];
    var avatars = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 40, 41, 42, 43, 44, 45, 46, 47, 48, 49, 50];
    //function
    //calendar
    var CalendarData = new Array(100);
    var madd = new Array(12);
    var tgString = "���ұ����켺�����ɹ�";
    var dzString = "�ӳ���î������δ�����纥";
    var numString = "һ�����������߰˾�ʮ";
    var monString = "�������������߰˾�ʮ����";
    var weekString = "��һ����������";
    var sx = "��ţ������������Ｆ����";
    var cYear,
            cMonth,
            cDay,
            TheDate;
    CalendarData = new Array(0xA4B, 0x5164B, 0x6A5, 0x6D4, 0x415B5, 0x2B6, 0x957, 0x2092F, 0x497, 0x60C96, 0xD4A, 0xEA5, 0x50DA9, 0x5AD, 0x2B6, 0x3126E, 0x92E, 0x7192D, 0xC95, 0xD4A, 0x61B4A, 0xB55, 0x56A, 0x4155B, 0x25D, 0x92D, 0x2192B, 0xA95, 0x71695, 0x6CA, 0xB55, 0x50AB5, 0x4DA, 0xA5B, 0x30A57, 0x52B, 0x8152A, 0xE95, 0x6AA, 0x615AA, 0xAB5, 0x4B6, 0x414AE, 0xA57, 0x526, 0x31D26, 0xD95, 0x70B55, 0x56A, 0x96D, 0x5095D, 0x4AD, 0xA4D, 0x41A4D, 0xD25, 0x81AA5, 0xB54, 0xB6A, 0x612DA, 0x95B, 0x49B, 0x41497, 0xA4B, 0xA164B, 0x6A5, 0x6D4, 0x615B4, 0xAB6, 0x957, 0x5092F, 0x497, 0x64B, 0x30D4A, 0xEA5, 0x80D65, 0x5AC, 0xAB6, 0x5126D, 0x92E, 0xC96, 0x41A95, 0xD4A, 0xDA5, 0x20B55, 0x56A, 0x7155B, 0x25D, 0x92D, 0x5192B, 0xA95, 0xB4A, 0x416AA, 0xAD5, 0x90AB5, 0x4BA, 0xA5B, 0x60A57, 0x52B, 0xA93, 0x40E95);
    madd[0] = 0;
    madd[1] = 31;
    madd[2] = 59;
    madd[3] = 90;
    madd[4] = 120;
    madd[5] = 151;
    madd[6] = 181;
    madd[7] = 212;
    madd[8] = 243;
    madd[9] = 273;
    madd[10] = 304;
    madd[11] = 334;
    function GetBit(m, n) {
        return (m >> n) & 1;
    };
    function e2c() {
        TheDate = (arguments.length != 3) ? new Date() : new Date(arguments[0], arguments[1], arguments[2]);
        var total,
                m,
                n,
                k;
        var isEnd = false;
        var tmp = TheDate.getYear();
        if (tmp < 1900) {
            tmp += 1900;
        }
        ;
        total = (tmp - 1921) * 365 + Math.floor((tmp - 1921) / 4) + madd[TheDate.getMonth()] + TheDate.getDate() - 38;
        if (TheDate.getYear() % 4 == 0 && TheDate.getMonth() > 1) {
            total++;
        }
        ;
        for (m = 0; m < 255; m++) {
            k = (CalendarData[m] < 0xfff) ? 11 : 12;
            for (n = k; n >= 0; n--) {
                if (total <= 29 + GetBit(CalendarData[m], n)) {
                    isEnd = true;
                    break;
                }
                ;
                total = total - 29 - GetBit(CalendarData[m], n);
            }
            ;
            if (isEnd) {
                break;
            }
            ;
        }
        ;
        cYear = 1921 + m;
        cMonth = k - n + 1;
        cDay = total;
        if (k == 12) {
            if (cMonth == Math.floor(CalendarData[m] / 0x10000) + 1) {
                cMonth = 1 - cMonth;
            }
            ;
            if (cMonth > Math.floor(CalendarData[m] / 0x10000) + 1) {
                cMonth--;
            }
            ;
        }
        ;
    };
    function GetcDateString() {
        var tmp = "";
        tmp += tgString.charAt((cYear - 4) % 10);
        tmp += dzString.charAt((cYear - 4) % 12);
        tmp += "";
        tmp += sx.charAt((cYear - 4) % 12);
        tmp += "�� ";
        if (cMonth < 1) {
            tmp += "��";
            tmp += monString.charAt(-cMonth - 1);
        } else {
            tmp += monString.charAt(cMonth - 1);
        }
        ;
        tmp += "��";
        tmp += (cDay < 11) ? "��" : ((cDay < 20) ? "ʮ" : ((cDay < 30) ? "إ" : "��ʮ"));
        if (cDay % 10 != 0 || cDay == 10) {
            tmp += numString.charAt((cDay - 1) % 10);
        }
        ;
        return tmp;
    };
    function GetLunarDay(solarYear, solarMonth, solarDay) {
        //solarYear = solarYear<1900?(1900+solarYear):solarYear;
        if (solarYear < 1921 || solarYear > 2020) {
            return "";
        } else {
            solarMonth = (parseInt(solarMonth) > 0) ? (solarMonth - 1) : 11;
            e2c(solarYear, solarMonth, solarDay);
            return GetcDateString();
        }
        ;
    };
    var GetDay = function () {
        return d.getFullYear() + '��' + (1 + d.getMonth()) + '��' + d.getDate() + '�� ����' + ['��', 'һ', '��', '��', '��', '��', '��'][d.getDay()];
    };
    //
    var rnd = function (a, b) {
        var n = a % 11117;
        for (var i = 0; i < 25 + b; i++) {
            n = n * n;
            n = n % 11117;
        }
        ;
        return n;
    };
    //
    $('#item-date-calendar')
            .text(GetDay());
    $('#item-subdate-calendar')
            .text(GetLunarDay(d.getFullYear(), (1 + d.getMonth()), d.getDate()));
    //size
    var sg = rnd(seed, 8) % 100;
    var sb = rnd(seed, 4) % 100;
    //insert html
    var html = '';
    for (var i = 0, l = rnd(seed, 9) % 3 + 2; i < l; i++) {
        var n = parseInt(sg * 0.01 * list.length, 10);
        var a = list[n];
        var m = parseInt(rnd(seed, (3 + i)) % 100 * 0.01 * avatars.length, 10);
        html += '<li><img class="c" src="' + system.path + '/ueditor/dialogs/emotion/images/ac/' + avatars[m] + '.gif"><p class="a">' + a.name + '</p><p class="b">' + a.good + '</p><span class="clearfix"></span></li>';
        //
        list.splice(n, 1);
        avatars.splice(m, 1);
    }
    ;
    $('#good').find('ul').eq(0)
            .html(html);
    html = '';
    for (var i = 0, l = rnd(seed, 7) % 3 + 2; i < l; i++) {
        var n = parseInt(sb * 0.01 * list.length, 10);
        var a = list[n];
        var m = parseInt(rnd(seed, (2 + i)) % 100 * 0.01 * avatars.length, 10);
        html += '<li><img class="c" src="' + system.path + '/ueditor/dialogs/emotion/images/ac/' + avatars[m] + '.gif"><p class="a">' + a.name + '</p><p class="b">' + a.bad + '</p><span class="clearfix"></span></li>';
        //
        list.splice(n, 1);
        avatars.splice(m, 1);
    }
    ;
    $('#bad').find('ul').eq(0)
            .html(html);
    //lucky
    var f = function () {
        //
        var n = rnd(seed * user.uid, 6) % 100;
        var t = 'ĩ��';
        //if
        if (n < 5) {
            //5%
            t = '����';
        } else if (n < 20) {
            //15%
            t = '��';
        } else if (n < 50) {
            //30%
            t = 'ĩ��';
        } else if (n < 60) {
            //10%
            t = '�뼪';
        } else if (n < 70) {
            //10%
            t = '��';
        } else if (n < 80) {
            //10%
            t = 'С��';
        } else if (n < 90) {
            //10%
            t = '�м�';
        } else {
            //5%
            t = '��';
        }
        ;
        $('#item-sign-calendar')
                .text(t)
                .css({
                    color: 'rgb(' + (10 + n * 0.8) + '%, 20%, 20%)'
                })
                .attr({
                    title: '��������ָ����' + n + '%'
                })
    }();
}();
</script>
<!--script-->
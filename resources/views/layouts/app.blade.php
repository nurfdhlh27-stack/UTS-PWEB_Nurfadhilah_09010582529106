<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#f3f6fa">
    <title>@yield('title', 'Perpustakaan') | Ruang Baca</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&family=Manrope:wght@500;600;700;800&display=swap" rel="stylesheet">
    <style>
        :root {
            color-scheme: light;
            font-family: "Inter", "Segoe UI", Arial, sans-serif;
            color: #1e293b;
            background: #f3f6fa;
            font-synthesis: none;
            text-rendering: optimizeLegibility;
            --forest: #1d4ed8;
            --forest-dark: #17243a;
            --leaf: #dbeafe;
            --orange: #3b82f6;
            --paper: #ffffff;
            --muted: #526174;
            --line: #dce3ec;
            --serif: "Manrope", "Segoe UI", Arial, sans-serif;
        }
        * { box-sizing: border-box; }
        body { min-width: 320px; min-height: 100vh; margin: 0; }
        a { color: inherit; text-decoration: none; }
        button, input, select { font: inherit; }
        button, a { -webkit-tap-highlight-color: transparent; }
        button:focus-visible, a:focus-visible, input:focus-visible, select:focus-visible { outline: 3px solid #d7855b80; outline-offset: 3px; }
        .app-shell { min-height: 100vh; }
        .sidebar {
            position: fixed; z-index: 5; inset: 0 auto 0 0; display: flex; width: 248px; flex-direction: column;
            padding: 30px 19px 20px; color: #f6f5f1; background: var(--forest-dark);
        }
        .brand { display: flex; align-items: center; gap: 12px; padding: 1px 10px; color: white; }
        .brand-mark { display: grid; width: 39px; height: 39px; place-items: center; border: 1px solid #ffffff35; border-radius: 13px; color: #d6e5cd; background: #ffffff0b; }
        .brand-name { display: block; font-family: var(--serif); font-size: 19px; line-height: 1.15; }
        .brand-caption { display: block; margin-top: 4px; color: #a8b8ad; font-size: 10px; letter-spacing: .16em; text-transform: uppercase; }
        .side-label { margin: 48px 10px 13px; color: #91a49a; font-size: 10px; font-weight: 700; letter-spacing: .16em; text-transform: uppercase; }
        .side-link { display: flex; align-items: center; gap: 12px; min-height: 47px; padding: 0 13px; border-radius: 11px; color: #d2ddd5; font-size: 13px; transition: .2s ease; }
        .side-link:hover, .side-link.active { color: white; background: #ffffff13; }
        .side-link.active { box-shadow: inset 3px 0 #d7855b; }
        .side-link svg { width: 18px; height: 18px; color: #b3c4b7; }
        .side-note { margin-top: auto; padding: 18px; border: 1px solid #ffffff17; border-radius: 15px; background: #ffffff08; }
        .side-note-icon { color: #d6e5cd; }
        .side-note p { margin: 12px 0 5px; font-family: var(--serif); font-size: 16px; }
        .side-note span { color: #a8b8ad; font-size: 11px; line-height: 1.6; }
        .main-area { min-height: 100vh; margin-left: 248px; }
        .topbar { height: 78px; display: flex; align-items: center; justify-content: space-between; padding: 0 clamp(24px, 4vw, 58px); border-bottom: 1px solid var(--line); background: #f6f5f1e8; }
        .breadcrumb { display: flex; align-items: center; gap: 10px; color: var(--muted); font-size: 12px; }
        .breadcrumb strong { color: #38453d; font-weight: 600; }
        .topbar-user { display: flex; align-items: center; gap: 12px; }
        .avatar { display: grid; width: 37px; height: 37px; place-items: center; border-radius: 50%; color: var(--forest); background: var(--leaf); font-size: 12px; font-weight: 700; }
        .user-copy { display: grid; gap: 2px; }
        .user-copy strong { font-size: 12px; }
        .user-copy span { color: var(--muted); font-size: 10px; }
        .logout-form { margin: 0 0 0 12px; }
        .logout-button { display: grid; width: 36px; height: 36px; place-items: center; border: 1px solid var(--line); border-radius: 10px; color: #68736b; background: transparent; cursor: pointer; transition: .2s; }
        .logout-button:hover { border-color: #e2c0ab; color: #a75239; background: #fff7f1; }
        .page-content { width: min(1320px, 100%); margin: 0 auto; padding: 40px clamp(24px, 4vw, 58px) 32px; }
        .page-footer { padding: 0 24px 22px; color: #a0a198; font-size: 10px; text-align: center; }
        .heading { display: flex; align-items: flex-end; justify-content: space-between; gap: 20px; margin-bottom: 28px; }
        .eyebrow { display: flex; align-items: center; gap: 8px; margin: 0 0 10px; color: #9a664d; font-size: 10px; font-weight: 700; letter-spacing: .15em; text-transform: uppercase; }
        .eyebrow::before { width: 20px; height: 1px; background: var(--orange); content: ""; }
        h1, h2, h3, p { margin-top: 0; }
        h1 { margin-bottom: 8px; color: #25342b; font-family: var(--serif); font-size: clamp(29px, 3vw, 39px); font-weight: 600; letter-spacing: -.025em; line-height: 1.2; }
        .subtitle { margin: 0; color: #85877f; font-size: 13px; line-height: 1.7; }
        .button { display: inline-flex; min-height: 43px; align-items: center; justify-content: center; gap: 9px; padding: 0 17px; border: 1px solid transparent; border-radius: 10px; color: white; background: var(--forest); font-size: 12px; font-weight: 600; cursor: pointer; transition: transform .2s, background .2s, box-shadow .2s; }
        .button:hover { transform: translateY(-1px); color: white; background: #254b3d; box-shadow: 0 6px 15px #193a3020; }
        .button svg { width: 16px; height: 16px; }
        .button.secondary { border-color: var(--line); color: #455147; background: var(--paper); }
        .button.secondary:hover { color: var(--forest); background: #f4f5ef; }
        .button.danger { color: #a94f43; background: #fff3ef; }
        .actions { display: flex; align-items: center; gap: 8px; flex-wrap: wrap; }
        .alert { display: flex; align-items: center; gap: 10px; margin-bottom: 20px; padding: 13px 16px; border: 1px solid #d7e6d8; border-radius: 12px; color: #315c3a; background: #eef6ed; font-size: 12px; }
        .alert.error-box { border-color: #f0d4cc; color: #9e4034; background: #fff1ed; }
        .stats-grid { display: grid; grid-template-columns: repeat(3, minmax(0, 1fr)); gap: 15px; margin: 26px 0 30px; }
        .stat-card { position: relative; display: flex; min-height: 116px; align-items: center; gap: 15px; overflow: hidden; padding: 20px; border: 1px solid #eae9e2; border-radius: 15px; background: var(--paper); }
        .stat-card::after { position: absolute; right: -21px; bottom: -34px; width: 95px; height: 95px; border: 1px solid #e9eee4; border-radius: 50%; content: ""; }
        .stat-icon { display: grid; width: 47px; height: 47px; flex: 0 0 47px; place-items: center; border-radius: 14px; color: var(--forest); background: #e7efe3; }
        .stat-card:nth-child(2) .stat-icon { color: #a45f40; background: #fbede4; }
        .stat-card:nth-child(3) .stat-icon { color: #617857; background: #edf0e3; }
        .stat-icon svg { width: 21px; height: 21px; }
        .stat-value { display: block; color: #2e3b32; font-family: var(--serif); font-size: 26px; font-weight: 600; line-height: 1.1; }
        .stat-label { display: block; margin-top: 6px; color: #898b82; font-size: 10px; letter-spacing: .04em; }
        .catalog-card, .form-card, .detail-card { overflow: hidden; border: 1px solid #e9e8e1; border-radius: 16px; background: var(--paper); box-shadow: 0 9px 28px #29362808; }
        .catalog-toolbar { display: flex; min-height: 78px; align-items: center; justify-content: space-between; gap: 16px; padding: 15px 21px; border-bottom: 1px solid #efeee9; }
        .catalog-title { display: flex; align-items: center; gap: 11px; }
        .catalog-title h2 { margin: 0 0 3px; color: #334137; font-family: var(--serif); font-size: 17px; font-weight: 600; }
        .catalog-title p { margin: 0; color: #999a91; font-size: 10px; }
        .result-count { padding: 5px 9px; border-radius: 20px; color: #566e50; background: #eef3e9; font-size: 10px; font-weight: 700; white-space: nowrap; }
        .search { display: flex; width: min(340px, 48%); align-items: center; gap: 8px; }
        .search-field { position: relative; flex: 1; }
        .search-field svg { position: absolute; top: 50%; left: 12px; width: 15px; height: 15px; transform: translateY(-50%); color: #9b9d93; pointer-events: none; }
        input, select { width: 100%; min-height: 43px; padding: 10px 12px; border: 1px solid #e4e3dc; border-radius: 9px; outline: none; color: #343d35; background: #fff; font-size: 12px; transition: border .2s, box-shadow .2s; }
        input::placeholder { color: #a5a69d; }
        input:focus, select:focus { border-color: #85a18a; box-shadow: 0 0 0 3px #dce9dc; }
        .search input { min-height: 39px; padding: 9px 12px 9px 36px; background: #fafaf7; font-size: 11px; }
        .search .button { min-height: 39px; padding: 0 13px; }
        .table-wrap { overflow-x: auto; }
        table { width: 100%; border-collapse: collapse; text-align: left; }
        th { padding: 12px 19px; color: #97998f; background: #fbfaf7; font-size: 9px; font-weight: 700; letter-spacing: .11em; text-transform: uppercase; white-space: nowrap; }
        td { padding: 13px 19px; border-top: 1px solid #f0efe9; color: #656b61; font-size: 11px; white-space: nowrap; }
        tbody tr { transition: background .16s; }
        tbody tr:hover { background: #fbfaf5; }
        .book-cell { display: flex; min-width: 205px; align-items: center; gap: 12px; }
        .book-cover { display: grid; width: 38px; height: 47px; flex: 0 0 38px; place-items: center; overflow: hidden; border-radius: 5px 8px 8px 5px; color: #fff7e8; background: linear-gradient(145deg, #789074, #3c5f4b); box-shadow: inset 4px 0 #ffffff1c, 2px 3px 5px #3044321c; }
        .book-cover svg { width: 18px; height: 18px; opacity: .85; }
        tbody tr:nth-child(3n + 2) .book-cover { background: linear-gradient(145deg, #cc9871, #9b6045); }
        tbody tr:nth-child(3n) .book-cover { background: linear-gradient(145deg, #8d9aae, #58657a); }
        .book-name { display: block; max-width: 220px; overflow: hidden; color: #37443a; font-size: 11px; font-weight: 700; text-overflow: ellipsis; }
        .book-author { display: block; margin-top: 4px; color: #a0a096; font-size: 10px; }
        .category-pill { display: inline-flex; align-items: center; padding: 5px 9px; border-radius: 20px; color: #607255; background: #eef2e8; font-size: 9px; font-weight: 600; }
        .stock-value { color: #43523f; font-weight: 700; }
        .row-actions { display: flex; align-items: center; gap: 4px; }
        .icon-link, .icon-button { display: grid; width: 30px; height: 30px; place-items: center; border: 0; border-radius: 8px; color: #7e857b; background: transparent; cursor: pointer; transition: .15s; }
        .icon-link:hover { color: var(--forest); background: #eaf0e7; }
        .icon-button:hover { color: #a94f43; background: #fff0eb; }
        .icon-link svg, .icon-button svg { width: 15px; height: 15px; }
        .delete-form { margin: 0; }
        .empty-state { padding: 54px 20px; color: #92958a; text-align: center; }
        .empty-state svg { width: 35px; height: 35px; margin-bottom: 12px; color: #9aab93; }
        .empty-state strong { display: block; margin-bottom: 6px; color: #4f5b50; font-family: var(--serif); font-size: 18px; }
        .pagination-wrap { padding: 14px 20px; border-top: 1px solid #f0efe9; }
        .pagination-wrap nav { display: flex; align-items: center; justify-content: space-between; gap: 10px; color: #898b82; font-size: 10px; }
        .pagination-wrap nav > div:first-child p { margin: 0; }
        .pagination-wrap nav > div:last-child > span { display: flex; gap: 4px; }
        .pagination-wrap a, .pagination-wrap span[aria-current] span, .pagination-wrap nav button { display: inline-grid; min-width: 30px; height: 30px; place-items: center; padding: 0 8px; border: 1px solid #e9e8e1; border-radius: 7px; color: #586257; background: white; font-size: 10px; }
        .pagination-wrap span[aria-current] span { border-color: var(--forest); color: white; background: var(--forest); }
        .pagination-wrap nav button:disabled { opacity: .4; }
        .form-card { max-width: 780px; padding: 27px; }
        .form-intro { margin: 0 0 24px; padding-bottom: 19px; border-bottom: 1px solid #eeede7; color: #8c8d84; font-size: 11px; line-height: 1.7; }
        .form-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 0 19px; }
        .form-row { margin-bottom: 17px; }
        label { display: block; margin: 0 0 7px; color: #495349; font-size: 11px; font-weight: 700; }
        .field-hint { margin: 6px 0 0; color: #a1a197; font-size: 9px; }
        .error { margin-top: 5px; color: #aa493b; font-size: 10px; }
        .remember { display: flex; align-items: center; gap: 9px; color: #747a70; font-size: 11px; font-weight: 500; }
        .remember input { width: 15px; min-height: 15px; height: 15px; accent-color: var(--forest); }
        .detail-hero { position: relative; display: flex; min-height: 210px; align-items: center; gap: 27px; overflow: hidden; padding: 30px; border-radius: 15px; color: white; background: linear-gradient(120deg, #193a30, #2b5140); }
        .detail-hero::after { position: absolute; top: -90px; right: -35px; width: 280px; height: 280px; border: 1px solid #ffffff1a; border-radius: 50%; box-shadow: 0 0 0 30px #ffffff06, 0 0 0 62px #ffffff05; content: ""; }
        .detail-cover { z-index: 1; display: grid; width: 105px; height: 140px; flex: 0 0 105px; place-items: center; border: 1px solid #ffffff45; border-radius: 7px 13px 13px 7px; color: #eff4e7; background: linear-gradient(145deg, #789074, #3c5f4b); box-shadow: inset 8px 0 #ffffff20, 8px 12px 20px #10251d40; }
        .detail-cover svg { width: 36px; height: 36px; }
        .detail-hero-copy { z-index: 1; }
        .detail-hero .eyebrow { color: #d9c2a9; }
        .detail-hero h1 { max-width: 600px; margin: 0 0 10px; color: white; font-size: clamp(28px, 3vw, 38px); }
        .detail-hero .subtitle { color: #d2ddd4; }
        .detail-info { display: grid; grid-template-columns: repeat(4, 1fr); gap: 1px; margin-top: 18px; overflow: hidden; border: 1px solid var(--line); border-radius: 14px; background: var(--line); }
        .info-item { min-height: 93px; padding: 18px; background: var(--paper); }
        .info-item span { display: block; margin-bottom: 9px; color: #a0a095; font-size: 9px; font-weight: 700; letter-spacing: .1em; text-transform: uppercase; }
        .info-item strong { color: #465246; font-size: 12px; font-weight: 600; }
        .guest-header { display: none; }
        .guest-main { min-height: calc(100vh - 54px); padding-top: 1px; }
        .guest-footer { padding: 0 20px 20px; color: #a0a198; font-size: 10px; text-align: center; }
        .login-layout { display: grid; width: min(1050px, calc(100% - 48px)); min-height: min(620px, calc(100vh - 155px)); grid-template-columns: 1fr .86fr; margin: 16px auto 35px; overflow: hidden; border: 1px solid #e9e8e1; border-radius: 22px; background: var(--paper); box-shadow: 0 24px 65px #28382c12; }
        .login-art { position: relative; display: flex; min-height: 520px; flex-direction: column; justify-content: space-between; overflow: hidden; padding: clamp(28px, 5vw, 58px); color: white; background: #193a30; }
        .login-art::before, .login-art::after { position: absolute; border: 1px solid #ffffff17; border-radius: 50%; content: ""; }
        .login-art::before { top: 27%; right: -130px; width: 440px; height: 440px; box-shadow: 0 0 0 35px #ffffff05, 0 0 0 75px #ffffff04; }
        .login-art::after { top: 45%; right: -26px; width: 225px; height: 225px; }
        .login-art-brand { z-index: 1; display: inline-flex; width: fit-content; align-items: center; gap: 11px; }
        .login-art-brand .brand-mark { border-radius: 13px; }
        .login-art-copy { z-index: 1; max-width: 420px; margin: auto 0; padding: 45px 0; }
        .login-art-kicker { margin-bottom: 17px; color: #d9c2a9; font-size: 10px; font-weight: 700; letter-spacing: .18em; text-transform: uppercase; }
        .login-art-copy h1 { margin: 0 0 19px; color: #fffefa; font-size: clamp(36px, 4.2vw, 54px); line-height: 1.12; }
        .login-art-copy h1 em { color: #d4dfc4; font-weight: 500; }
        .login-art-copy p { max-width: 350px; margin: 0; color: #c0cec4; font-size: 12px; line-height: 1.8; }
        .login-art-foot { z-index: 1; color: #aebfb3; font-size: 10px; letter-spacing: .04em; }
        .book-stack { position: absolute; right: 37px; bottom: 50px; display: flex; height: 142px; align-items: flex-end; gap: 7px; transform: rotate(-9deg); }
        .book-stack span { display: block; width: 30px; border: 1px solid #ffffff40; border-radius: 5px 7px 7px 5px; box-shadow: inset 5px 0 #ffffff21, 4px 6px 12px #0c231d35; }
        .book-stack span:nth-child(1) { height: 98px; background: #bc805e; }
        .book-stack span:nth-child(2) { height: 128px; background: #728668; }
        .book-stack span:nth-child(3) { height: 111px; background: #697c91; }
        .book-stack span:nth-child(4) { height: 139px; background: #c9a973; }
        .login-panel { display: flex; align-items: center; padding: clamp(28px, 5vw, 62px); }
        .login-card { width: 100%; max-width: 360px; margin: auto; }
        .login-welcome { display: inline-flex; align-items: center; gap: 7px; margin-bottom: 18px; padding: 7px 10px; border-radius: 30px; color: #5d7459; background: #eff3e9; font-size: 9px; font-weight: 700; letter-spacing: .04em; }
        .login-welcome svg { width: 13px; height: 13px; }
        .login-card h2 { margin: 0 0 8px; color: #26362c; font-family: var(--serif); font-size: 30px; font-weight: 600; }
        .login-card > p { margin: 0 0 26px; color: #8d8e84; font-size: 11px; line-height: 1.7; }
        .login-card .form-row { margin-bottom: 17px; }
        .login-card input { min-height: 47px; }
        .login-submit { width: 100%; min-height: 47px; justify-content: space-between; margin-top: 21px; padding: 0 17px; }
        .login-submit svg { width: 17px; height: 17px; }
        .login-meta { display: flex; justify-content: center; gap: 6px; margin-top: 22px; color: #aaa99f; font-size: 9px; }
        .login-meta span { color: #89917e; }
        @media (max-width: 1050px) {
            .sidebar { width: 215px; }
            .main-area { margin-left: 215px; }
            .page-content { padding-right: 28px; padding-left: 28px; }
            .stats-grid { gap: 10px; }
            .stat-card { gap: 11px; padding: 16px; }
            td, th { padding-right: 13px; padding-left: 13px; }
        }
        @media (max-width: 760px) {
            .sidebar { position: static; width: auto; height: auto; flex-direction: row; align-items: center; justify-content: space-between; padding: 13px 18px; }
            .side-label, .side-note, .side-link span { display: none; }
            .side-link { min-height: 39px; padding: 0 11px; }
            .sidebar nav { margin-left: auto; }
            .main-area { margin-left: 0; }
            .topbar { height: 63px; padding: 0 20px; }
            .page-content { padding: 28px 20px 24px; }
            .page-footer { padding-bottom: 16px; }
            .heading { align-items: flex-start; }
            .stats-grid { gap: 9px; }
            .stat-card { min-height: 98px; gap: 9px; padding: 12px; }
            .stat-icon { width: 36px; height: 36px; flex-basis: 36px; border-radius: 11px; }
            .stat-icon svg { width: 17px; height: 17px; }
            .stat-value { font-size: 21px; }
            .stat-label { font-size: 9px; }
            .catalog-toolbar { align-items: flex-start; flex-direction: column; }
            .search { width: 100%; }
            .login-layout { grid-template-columns: .9fr 1fr; }
            .login-art { min-height: 475px; padding: 27px; }
            .book-stack { right: 20px; bottom: 45px; transform: scale(.82) rotate(-9deg); transform-origin: right bottom; }
            .login-panel { padding: 28px; }
        }
        @media (max-width: 560px) {
            .sidebar { padding: 11px 14px; }
            .brand-name { font-size: 16px; }
            .brand-caption { font-size: 8px; }
            .brand-mark { width: 35px; height: 35px; }
            .side-link { margin-left: 6px; }
            .topbar { padding: 0 15px; }
            .user-copy { display: none; }
            .logout-form { margin-left: 0; }
            .page-content { padding: 25px 15px 22px; }
            .heading { align-items: flex-start; flex-direction: column; gap: 15px; }
            .heading .button { width: 100%; }
            h1 { font-size: 30px; }
            .stats-grid { grid-template-columns: 1fr; }
            .stat-card { min-height: 76px; padding: 13px 16px; }
            .catalog-toolbar { padding: 15px; }
            .catalog-card { border-radius: 13px; }
            th, td { padding: 11px 12px; }
            .form-card { padding: 19px; }
            .form-grid { grid-template-columns: 1fr; gap: 0; }
            .detail-hero { min-height: 185px; gap: 16px; padding: 22px 18px; }
            .detail-cover { width: 73px; height: 105px; flex-basis: 73px; }
            .detail-hero h1 { font-size: 26px; }
            .detail-info { grid-template-columns: 1fr 1fr; }
            .info-item { min-height: 77px; padding: 14px; }
            .login-layout { width: calc(100% - 28px); grid-template-columns: 1fr; margin-top: 5px; border-radius: 17px; }
            .login-art { min-height: 245px; padding: 23px; }
            .login-art-copy { margin: 30px 0 4px; padding: 0; }
            .login-art-copy h1 { max-width: 310px; margin-bottom: 9px; font-size: 34px; }
            .login-art-copy p { max-width: 280px; font-size: 10px; }
            .login-art-kicker { margin-bottom: 9px; font-size: 8px; }
            .login-art-foot, .book-stack { display: none; }
            .login-panel { padding: 28px 23px 30px; }
            .login-card h2 { font-size: 26px; }
        }
        @media (prefers-reduced-motion: reduce) { *, *::before, *::after { scroll-behavior: auto !important; transition-duration: .01ms !important; animation-duration: .01ms !important; } }
        body { line-height: 1.55; }
        .sidebar { background: #17243a; }
        .side-label { color: #b7c5d8; font-size: 11px; }
        .brand-caption, .side-note span { color: #c5d0df; }
        .side-link { color: #e1e8f1; font-size: 14px; }
        .side-link svg { color: #c4d2e4; }
        .side-link:hover, .side-link.active { background: #2a3b55; }
        .side-link.active { box-shadow: inset 3px 0 #60a5fa; }
        .side-note { border-color: #46566d; background: #202f46; }
        .side-note-icon { color: #93c5fd; }
        .topbar { background: #fff; }
        .breadcrumb { color: #526174; font-size: 13px; }
        .breadcrumb strong { color: #1e293b; }
        .avatar { color: #1e40af; background: #dbeafe; }
        .page-footer, .guest-footer { color: #526174; font-size: 11px; }
        h1, h2, h3, .brand-name, .side-note p, .stat-value, .catalog-title h2, .empty-state strong, .login-card h2 { font-family: "Manrope", "Segoe UI", Arial, sans-serif; }
        h1 { color: #17243a; font-weight: 800; }
        .eyebrow { color: #1d4ed8; font-size: 11px; }
        .eyebrow::before { background: #3b82f6; }
        .subtitle { color: #526174; font-size: 14px; }
        .button { background: #1d4ed8; }
        .button:hover { background: #1e40af; box-shadow: 0 6px 15px #1d4ed830; }
        .button.secondary { border-color: #d5deea; color: #334155; background: #fff; }
        .button.secondary:hover { color: #1e40af; background: #eff6ff; }
        .alert { border-color: #b7e4c7; color: #166534; background: #f0fdf4; font-size: 13px; }
        .alert.error-box { border-color: #fecaca; color: #991b1b; background: #fef2f2; }
        .stat-card { border-color: #dce3ec; background: #fff; }
        .stat-icon { color: #1d4ed8; background: #dbeafe; }
        .stat-card:nth-child(2) .stat-icon { color: #0369a1; background: #e0f2fe; }
        .stat-card:nth-child(3) .stat-icon { color: #4338ca; background: #e0e7ff; }
        .stat-label { color: #526174; font-size: 11px; }
        .catalog-card, .form-card, .detail-card { border-color: #dce3ec; background: #fff; }
        .catalog-toolbar { border-color: #e2e8f0; }
        .catalog-title h2 { color: #1e293b; }
        .catalog-title p { color: #526174; font-size: 11px; }
        .result-count { color: #1e40af; background: #dbeafe; font-size: 11px; }
        input, select { border-color: #cbd5e1; color: #1e293b; font-size: 13px; }
        input::placeholder { color: #64748b; }
        input:focus, select:focus { border-color: #3b82f6; box-shadow: 0 0 0 3px #dbeafe; }
        .search input { border-color: #cbd5e1; background: #fff; font-size: 12px; }
        th { color: #475569; background: #f8fafc; font-size: 10px; }
        td { border-color: #e8edf3; color: #334155; font-size: 12px; }
        tbody tr:hover { background: #f8fbff; }
        .book-cover { background: linear-gradient(145deg, #60a5fa, #1d4ed8); box-shadow: inset 4px 0 #ffffff35, 2px 3px 5px #1e3a5f25; }
        tbody tr:nth-child(3n + 2) .book-cover { background: linear-gradient(145deg, #38bdf8, #0369a1); }
        tbody tr:nth-child(3n) .book-cover { background: linear-gradient(145deg, #818cf8, #4338ca); }
        .book-name { color: #1e293b; font-size: 12px; }
        .book-author { color: #526174; font-size: 11px; }
        .category-pill { color: #1e40af; background: #dbeafe; font-size: 10px; }
        .stock-value { color: #1e293b; }
        .icon-link, .icon-button { color: #475569; }
        .icon-link:hover { color: #1d4ed8; background: #dbeafe; }
        .empty-state { color: #526174; font-size: 12px; }
        .empty-state strong { color: #1e293b; }
        .form-intro { color: #526174; font-size: 12px; }
        label { color: #334155; font-size: 12px; }
        .field-hint { color: #526174; font-size: 11px; }
        .error { color: #b91c1c; font-size: 11px; }
        .remember { color: #475569; font-size: 12px; }
        .detail-hero { background: linear-gradient(120deg, #17243a, #1e40af); }
        .detail-hero .eyebrow { color: #bfdbfe; }
        .detail-hero .subtitle { color: #e2e8f0; }
        .detail-cover { background: linear-gradient(145deg, #60a5fa, #1d4ed8); }
        .info-item span { color: #526174; font-size: 10px; }
        .info-item strong { color: #1e293b; font-size: 13px; }
        .login-art { background: radial-gradient(ellipse at 93% 76%, #1e40af55 0, transparent 43%), #17243a; }
        .login-art-copy h1 { color: #fff; }
        .login-art-copy h1 em { color: #bfdbfe; }
        .login-art-copy h1 { font-size: clamp(34px, 3.4vw, 46px); line-height: 1.18; }
        .login-art-kicker { color: #93c5fd; }
        .login-art-copy p { max-width: 370px; color: #e2e8f0; font-size: 13px; }
        .login-art-foot { color: #cbd5e1; font-size: 10px; }
        .book-stack { right: 40px; bottom: 62px; opacity: .82; }
        .book-stack span:nth-child(1) { background: #38bdf8; }
        .book-stack span:nth-child(2) { background: #2563eb; }
        .book-stack span:nth-child(3) { background: #818cf8; }
        .book-stack span:nth-child(4) { background: #60a5fa; }
        .login-welcome { color: #1e40af; background: #dbeafe; }
        .login-card h2 { color: #17243a; font-weight: 800; }
        .login-card > p { color: #526174; font-size: 13px; }
        .login-meta { color: #526174; font-size: 10px; }
        .page-content { padding-top: 46px; }
        .heading { margin-bottom: 32px; }
        .heading h1 { font-size: clamp(34px, 3.3vw, 43px); letter-spacing: -.035em; }
        .heading .subtitle { max-width: 580px; font-size: 15px; }
        .stats-grid { gap: 18px; margin: 30px 0 34px; }
        .stat-card { min-height: 126px; gap: 18px; padding: 23px; border-radius: 17px; }
        .stat-icon { width: 52px; height: 52px; flex-basis: 52px; border-radius: 15px; }
        .stat-icon svg { width: 23px; height: 23px; }
        .stat-value { font-size: 30px; }
        .stat-label { margin-top: 7px; color: #475569; font-size: 12px; }
        .catalog-card { border-radius: 17px; }
        .catalog-toolbar { min-height: 86px; padding: 18px 23px; }
        .catalog-title { gap: 13px; }
        .catalog-title h2 { font-size: 20px; }
        .catalog-title p { font-size: 12px; }
        .result-count { padding: 6px 11px; font-size: 12px; }
        .search { width: min(410px, 52%); gap: 10px; }
        .search input { min-height: 43px; font-size: 13px; }
        .search .button { min-height: 43px; padding: 0 16px; }
        th { padding: 15px 21px; font-size: 11px; }
        td { padding: 16px 21px; font-size: 13px; }
        .actions-heading { text-align: center; }
        .book-cell { min-width: 260px; gap: 14px; }
        .book-cover { width: 44px; height: 55px; flex-basis: 44px; }
        .book-cover svg { width: 21px; height: 21px; }
        .book-name { max-width: 280px; font-size: 13px; }
        .book-author { margin-top: 5px; color: #475569; font-size: 12px; }
        .category-pill { padding: 6px 11px; font-size: 11px; }
        .stock-value { font-size: 14px; }
        .stock-unit { color: #526174; font-size: 12px; }
        .row-actions { justify-content: center; gap: 6px; }
        .icon-link, .icon-button { width: 34px; height: 34px; }
        .icon-link svg, .icon-button svg { width: 17px; height: 17px; }
        .pagination-wrap { padding: 16px 22px; }
        .empty-state { padding: 64px 20px; font-size: 13px; }
        @media (max-width: 1050px) {
            .page-content { padding-top: 34px; }
            .heading h1 { font-size: clamp(32px, 3.5vw, 38px); }
            .stats-grid { gap: 12px; }
            .stat-card { min-height: 112px; gap: 12px; padding: 16px; }
            .stat-icon { width: 44px; height: 44px; flex-basis: 44px; }
            .stat-value { font-size: 26px; }
            .stat-label { font-size: 10px; }
            th, td { padding-right: 15px; padding-left: 15px; }
        }
        @media (max-width: 560px) {
            .page-content { padding-top: 26px; }
            .heading { margin-bottom: 24px; }
            .heading h1 { font-size: 30px; }
            .heading .subtitle { font-size: 13px; }
            .stats-grid { gap: 10px; margin: 22px 0 25px; }
            .stat-card { min-height: 82px; gap: 13px; padding: 13px 16px; }
            .stat-icon { width: 40px; height: 40px; flex-basis: 40px; }
            .stat-value { font-size: 24px; }
            .stat-label { font-size: 10px; }
            .catalog-toolbar { gap: 13px; padding: 16px; }
            .catalog-title h2 { font-size: 18px; }
            .search { gap: 7px; }
            .search input { font-size: 12px; }
            th { font-size: 10px; }
            td { font-size: 12px; }
            .book-cell { min-width: 220px; }
            .book-name { font-size: 12px; }
            .book-author { font-size: 11px; }
        }
        @media (max-width: 760px) {
            .side-link { color: #e1e8f1; }
            .side-link.active { background: #2a3b55; }
        }
        :root {
            color: #1e293b;
            background: #f5f8fc;
            --muted: #475569;
            --line: #dbe3ee;
        }
        body { color: #1e293b; background: #f5f8fc; font-size: 15px; }
        button:focus-visible, a:focus-visible, input:focus-visible, select:focus-visible {
            outline-color: #60a5fa;
        }
        .brand-caption { letter-spacing: .1em; }
        .side-label { letter-spacing: .1em; }
        .side-link { min-height: 48px; font-size: 14px; font-weight: 500; }
        .breadcrumb { font-size: 14px; }
        .user-copy strong { font-size: 13px; }
        .user-copy span { font-size: 12px; }
        .page-footer, .guest-footer { color: #475569; font-size: 12px; }
        .eyebrow { letter-spacing: .1em; }
        .subtitle { color: #475569; }
        .stat-label { color: #475569; font-size: 12px; }
        .catalog-title p { color: #475569; font-size: 13px; }
        .search input, input, select { font-size: 14px; }
        input::placeholder { color: #64748b; }
        th { color: #334155; font-size: 11px; letter-spacing: .08em; }
        td { color: #334155; font-size: 14px; }
        .book-name { color: #17243a; font-size: 14px; }
        .book-author { color: #475569; font-size: 13px; }
        .category-pill { font-size: 12px; }
        .stock-unit { color: #475569; font-size: 13px; }
        .form-intro { color: #475569; font-size: 13px; }
        label { color: #1e293b; font-size: 13px; }
        .field-hint { color: #475569; font-size: 12px; }
        .error { font-size: 12px; }
        .info-item span { color: #475569; font-size: 11px; }
        .info-item strong { color: #17243a; font-size: 14px; }
        .login-card > p { color: #475569; font-size: 14px; }
        .login-art-copy p { line-height: 1.8; }
        @media (max-width: 760px) {
            .side-label, .side-note { display: none; }
            .side-link span { display: inline; }
            .side-link { gap: 8px; padding: 0 10px; font-size: 13px; }
        }
        @media (max-width: 560px) {
            .brand-caption { display: none; }
            .side-link { font-size: 12px; }
            .topbar { gap: 10px; }
            .breadcrumb { gap: 7px; font-size: 12px; }
            .catalog-title p { font-size: 12px; }
            .book-name { font-size: 13px; }
            .book-author { font-size: 12px; }
        }
        :root {
            background: #f6f5ef;
            --forest: #167c80;
            --forest-dark: #173b42;
            --leaf: #dceeed;
            --orange: #d2a66e;
            --muted: #4d6264;
            --line: #dce5e1;
        }
        body { color: #203a3d; background: #f6f5ef; }
        .sidebar { background: #173b42; }
        .brand-mark, .side-note-icon { color: #b9ddda; }
        .brand-caption, .side-note span { color: #c4d9d7; }
        .side-label { color: #b7cfcd; }
        .side-link { color: #e4efed; }
        .side-link svg { color: #b9ddda; }
        .side-link:hover, .side-link.active { background: #28515a; }
        .side-link.active { box-shadow: inset 3px 0 #e1bd83; }
        .side-note { border-color: #42636a; background: #21474e; }
        .topbar { background: #fffefa; }
        .avatar, .login-welcome { color: #11666a; background: #dceeed; }
        h1, .login-card h2 { color: #173b42; }
        .eyebrow { color: #176f71; }
        .eyebrow::before { background: #d2a66e; }
        .button { background: #167c80; }
        .button:hover { background: #11666a; box-shadow: 0 6px 15px #173b4226; }
        .button.secondary:hover { color: #11666a; background: #edf5f1; }
        .stat-card { border-color: #dce5e1; background: #fffefa; }
        .stat-icon { color: #167c80; background: #dceeed; }
        .stat-card:nth-child(2) .stat-icon { color: #936a35; background: #f4ead6; }
        .stat-card:nth-child(3) .stat-icon { color: #4c746e; background: #e3eee8; }
        .catalog-card, .form-card, .detail-card { border-color: #dce5e1; background: #fffefa; }
        .result-count, .category-pill { color: #11666a; background: #e2f0ed; }
        input:focus, select:focus { border-color: #55a3a0; box-shadow: 0 0 0 3px #dceeed; }
        .book-cover, .detail-cover { background: linear-gradient(145deg, #55aaa2, #167c80); }
        tbody tr:nth-child(3n + 2) .book-cover { background: linear-gradient(145deg, #d2b27b, #987442); }
        tbody tr:nth-child(3n) .book-cover { background: linear-gradient(145deg, #759994, #426a67); }
        .icon-link:hover { color: #11666a; background: #dceeed; }
        .detail-hero { background: linear-gradient(120deg, #173b42, #167c80); }
        .detail-hero .eyebrow { color: #c2e0dc; }
        .login-art { background: radial-gradient(ellipse at 93% 76%, #167c8055 0, transparent 43%), #173b42; }
        .login-art-copy h1 em { color: #b9ddda; }
        .login-art-kicker { color: #b9ddda; }
        .book-stack span:nth-child(1) { background: #d2a66e; }
        .book-stack span:nth-child(2) { background: #167c80; }
        .book-stack span:nth-child(3) { background: #759994; }
        .book-stack span:nth-child(4) { background: #e0c48e; }
        .pagination-wrap span[aria-current] span { border-color: #167c80; background: #167c80; }
        .search { width: min(640px, 68%); gap: 9px; }
        .search-field { min-width: 150px; }
        .search select { width: 155px; flex: 0 0 155px; }
        .search .button { flex: 0 0 auto; }
        @media (max-width: 760px) {
            .search { width: 100%; }
        }
        @media (max-width: 560px) {
            .search { gap: 7px; }
            .search-field { min-width: 0; }
            .search select { width: 130px; flex-basis: 130px; }
            .search .button { padding: 0 12px; }
        }
    </style>
</head>
<body>
    @auth
        <div class="app-shell">
            <aside class="sidebar">
                <a class="brand" href="{{ route('books.index') }}">
                    <span class="brand-mark">
                        <svg width="21" height="21" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M12 7v14M3 18V5a2 2 0 0 1 2-2h5a2 2 0 0 1 2 2v16a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2Zm18 0V5a2 2 0 0 0-2-2h-5a2 2 0 0 0-2 2v16a2 2 0 0 1 2-2h5a2 2 0 0 1 2 2Z"/></svg>
                    </span>
                    <span><span class="brand-name">Ruang Baca</span><span class="brand-caption">Library workspace</span></span>
                </a>
                <p class="side-label">Menu utama</p>
                <nav>
                    <a class="side-link {{ request()->routeIs('books.*') ? 'active' : '' }}" href="{{ route('books.index') }}">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M4 5.5A2.5 2.5 0 0 1 6.5 3H20v17H6.5A2.5 2.5 0 0 1 4 17.5z"/><path d="M4 17.5A2.5 2.5 0 0 1 6.5 15H20M8 7h7"/></svg>
                        <span>Koleksi Buku</span>
                    </a>
                </nav>
                <div class="side-note">
                    <svg class="side-note-icon" width="19" height="19" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M12 3v18M5 7h9.5a3.5 3.5 0 1 1 0 7H9.5a3.5 3.5 0 1 0 0 7H19"/></svg>
                    <p>Ruang untuk bertumbuh.</p>
                    <span>Setiap buku menyimpan cerita dan pengetahuan baru.</span>
                </div>
            </aside>
            <div class="main-area">
                <header class="topbar">
                    <div class="breadcrumb"><span>Ruang Baca</span><span>/</span><strong>@yield('breadcrumb', 'Koleksi')</strong></div>
                    <div class="topbar-user">
                        <span class="avatar">{{ mb_strtoupper(mb_substr(auth()->user()->name, 0, 1)) }}</span>
                        <span class="user-copy"><strong>{{ auth()->user()->name }}</strong><span>Administrator</span></span>
                        <form class="logout-form" method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button class="logout-button" type="submit" aria-label="Keluar" title="Keluar">
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M10 17l5-5-5-5M15 12H3"/><path d="M12 3h6a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-6"/></svg>
                            </button>
                        </form>
                    </div>
                </header>
                <main class="page-content">
                    @if (session('status'))
                        <div class="alert"><span aria-hidden="true">✦</span>{{ session('status') }}</div>
                    @endif
                    @if ($errors->any() && ! $errors->has('login'))
                        <div class="alert error-box">Periksa kembali isian yang ditandai.</div>
                    @endif
                    @yield('content')
                </main>
                <footer class="page-footer">RUANG BACA <span aria-hidden="true">·</span> Kelola koleksi, rawat pengetahuan.</footer>
            </div>
        </div>
    @else
        <main class="guest-main">
            @if ($errors->any() && ! $errors->has('login'))
                <div class="alert error-box" style="max-width:1050px;margin:0 auto 15px">Periksa kembali isian yang ditandai.</div>
            @endif
            @yield('content')
        </main>
        <footer class="guest-footer">RUANG BACA <span aria-hidden="true">·</span> Tempat cerita menemukan pembacanya.</footer>
    @endauth
</body>
</html>

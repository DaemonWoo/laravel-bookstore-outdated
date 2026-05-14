<div style="
    max-width: 600px;
    margin: 40px auto;
    padding: 32px;
    background: #ffffff;
    border-radius: 16px;
    border: 1px solid #e5e7eb;
    font-family: Arial, sans-serif;
    box-shadow: 0 4px 12px rgba(0,0,0,0.08);
">

    <div style="text-align: center; margin-bottom: 24px;">
        <h1 style="
            color: #111827;
            font-size: 28px;
            margin-bottom: 12px;
        ">
            Worker Created Successfully 🎉
        </h1>

        <p style="
            color: #6b7280;
            font-size: 16px;
            margin: 0;
        ">
            A new worker account has been added to the system.
        </p>
    </div>

    <div style="
        background: #f3f4f6;
        padding: 20px;
        border-radius: 12px;
        margin-top: 24px;
    ">

        <p style="
            font-size: 18px;
            color: #111827;
            margin: 0;
        ">
            <strong>Worker Name:</strong>
            {{ $name }}
        </p>

    </div>

    <div style="
        margin-top: 32px;
        text-align: center;
    ">
        <a href="{{ url('/workers') }}"
           style="
                display: inline-block;
                padding: 12px 20px;
                background: #2563eb;
                color: white;
                text-decoration: none;
                border-radius: 8px;
                font-weight: bold;
           ">
            View Workers
        </a>
    </div>

    <div style="
        margin-top: 32px;
        text-align: center;
        font-size: 13px;
        color: #9ca3af;
    ">
        This email was generated automatically by your Laravel application.
    </div>

</div>

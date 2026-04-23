# Project File Structure Example

This document outlines the standard file structure for our web application. We use a feature-based organization to keep related files together, making the codebase easier to navigate and maintain.

```text
my-project/
├── app/                       # Main application source code
│   ├── (auth)/                # Route group for authentication pages (e.g., login, register)
│   │   ├── login/
│   │   │   └── page.tsx       # Login page component
│   │   └── register/
│   │       └── page.tsx       # Registration page component
│   ├── api/                   # API routes for backend endpoints
│   │   └── users/
│   │       └── route.ts       # GET/POST handlers for /api/users
│   ├── dashboard/             # Dashboard feature module
│   │   ├── layout.tsx         # Shared layout for all dashboard pages
│   │   ├── page.tsx           # Main dashboard view
│   │   └── loading.tsx        # Loading state for the dashboard
│   ├── components/            # Reusable UI components used across the app
│   │   ├── ui/                # Generic UI elements (buttons, inputs, modals)
│   │   │   ├── Button.tsx
│   │   │   └── Card.tsx
│   │   └── layout/            # Layout-specific components (header, footer, sidebar)
│   │       ├── Header.tsx
│   │       └── Sidebar.tsx
│   ├── lib/                   # Utility functions, helpers, and constants
│   │   ├── utils.ts           # General utility functions
│   │   └── constants.ts       # App-wide configuration constants
│   ├── hooks/                 # Custom React hooks
│   │   └── useAuth.ts         # Hook for managing user authentication state
│   ├── styles/                # Global styles and design system tokens
│   │   └── globals.css        # Main stylesheet
│   ├── layout.tsx             # Root layout wrapping the entire application
│   └── page.tsx               # Landing page for the application (/)
├── public/                    # Static assets (images, fonts, icons)
│   ├── images/
│   │   └── logo.svg
│   └── favicon.ico
├── .env.local                 # Local environment variables (not committed)
├── .gitignore                 # Files and directories ignored by Git
├── next.config.mjs            # Configuration for the framework (e.g., Next.js)
├── package.json               # Project dependencies and npm scripts
├── tsconfig.json              # TypeScript configuration
└── README.md                  # Project documentation and setup instructions
```

## Key Directories

*   **`app/`**: The core directory containing all routes, components, and application logic.
*   **`app/components/`**: Houses reusable UI elements. We separate generic `ui` components from structural `layout` components.
*   **`app/lib/`**: Contains pure functions, utility methods, and constants that don't directly render UI but support the application's logic.
*   **`public/`**: Stores static files served directly to the browser at the root path (`/`).

## Best Practices

*   **Colocation**: Keep components, hooks, and utilities as close to where they are used as possible. If a component is only used in the `dashboard`, consider placing it inside the `dashboard/` folder instead of the global `components/` folder.
*   **Index Files**: Use `index.ts` files sparingly to avoid confusion, preferring explicit file names.
*   **Naming Conventions**:
    *   React components: PascalCase (e.g., `Button.tsx`).
    *   Utility files: camelCase (e.g., `formatDate.ts`).
    *   Route files: lowercase, defined by the framework (e.g., `page.tsx`, `layout.tsx`).

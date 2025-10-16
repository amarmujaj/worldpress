import Link from "next/link"
import { Button } from "@/components/ui/button"

export function Navigation() {
  return (
    <nav className="fixed top-0 left-0 right-0 z-50 bg-background/80 backdrop-blur-md border-b border-border">
      <div className="container mx-auto px-4 lg:px-8">
        <div className="flex items-center justify-between h-16">
          <Link href="/" className="text-xl font-bold tracking-tight">
            ELITE<span className="text-primary">.</span>
          </Link>

          <div className="hidden md:flex items-center gap-8">
            <Link href="/" className="text-sm hover:text-primary transition-colors">
              Home
            </Link>
            <Link href="/inventory" className="text-sm hover:text-primary transition-colors">
              Inventory
            </Link>
            <Link href="/about" className="text-sm hover:text-primary transition-colors">
              About
            </Link>
            <Link href="/contact" className="text-sm hover:text-primary transition-colors">
              Contact
            </Link>
          </div>

          <Button asChild size="sm" className="hidden md:inline-flex">
            <Link href="/contact">Get Started</Link>
          </Button>

          <Button variant="ghost" size="sm" className="md:hidden">
            Menu
          </Button>
        </div>
      </div>
    </nav>
  )
}

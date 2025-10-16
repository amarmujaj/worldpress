import Link from "next/link"

export function Footer() {
  return (
    <footer className="bg-card border-t border-border mt-20">
      <div className="container mx-auto px-4 lg:px-8 py-12">
        <div className="grid grid-cols-1 md:grid-cols-4 gap-8">
          <div>
            <h3 className="text-lg font-bold mb-4">
              ELITE<span className="text-primary">.</span>
            </h3>
            <p className="text-sm text-muted-foreground leading-relaxed">
              Your premier destination for high-performance motorcycles.
            </p>
          </div>

          <div>
            <h4 className="font-semibold mb-4">Quick Links</h4>
            <ul className="space-y-2 text-sm">
              <li>
                <Link href="/inventory" className="text-muted-foreground hover:text-primary transition-colors">
                  Browse Inventory
                </Link>
              </li>
              <li>
                <Link href="/about" className="text-muted-foreground hover:text-primary transition-colors">
                  About Us
                </Link>
              </li>
              <li>
                <Link href="/contact" className="text-muted-foreground hover:text-primary transition-colors">
                  Contact
                </Link>
              </li>
            </ul>
          </div>

          <div>
            <h4 className="font-semibold mb-4">Categories</h4>
            <ul className="space-y-2 text-sm">
              <li className="text-muted-foreground">Sport Bikes</li>
              <li className="text-muted-foreground">Cruisers</li>
              <li className="text-muted-foreground">Adventure</li>
              <li className="text-muted-foreground">Touring</li>
            </ul>
          </div>

          <div>
            <h4 className="font-semibold mb-4">Contact</h4>
            <ul className="space-y-2 text-sm text-muted-foreground">
              <li>123 Rider Street</li>
              <li>Los Angeles, CA 90001</li>
              <li className="pt-2">info@elitemotorcycles.com</li>
              <li>(555) 123-4567</li>
            </ul>
          </div>
        </div>

        <div className="border-t border-border mt-8 pt-8 text-center text-sm text-muted-foreground">
          <p>&copy; 2025 Elite Motorcycles. All rights reserved.</p>
        </div>
      </div>
    </footer>
  )
}
